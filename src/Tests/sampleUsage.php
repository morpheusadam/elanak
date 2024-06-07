<?php

// This code is a sample usage and will not work if copied and pasted due to dependencies on the database.
// This function is used to send standard SMS.

public function sendSMS($messages,$to)
{
    // Check if SMS sending is enabled in the settings.
    if (SettingsController::get('sms_enabled') == true) {
        // Get the provider name from the settings.
        $provider =  SettingsController::get('sms_provider');
        // Get the API key for the selected provider from the database.
        $api = SMS::where('provider', $provider)->value('api');
        // Get the sender information for the selected provider from the database.
        $sender = SMS::where('provider', $provider)->value('sender');
        // Use the Elanak library to send the SMS via the selected provider.
        return Elanak::send($messages)->via($provider)->api($api)->from($sender)->to($to)->dispatch();
    } else {
        // If SMS sending is not enabled, return a JSON response indicating that SMS is disabled.
        return response()->json(['message' => __("message.smsdisabled")]);
    }
}

// This function is used to send pattern-based SMS.

public function sendSMSPattern($to, $patternName, $patternKey)
{
    // Check if SMS sending is enabled in the settings.
    if (SettingsController::get('sms_enabled')) {

        // Get the provider name from the settings.
        $providerName = SettingsController::get('sms_provider');
        // Get the provider details from the database.
        $provider = SMS::where('provider', $providerName)->first();

        // If the provider is not found in the database, log an error and return a message.
        if (!$provider) {
            Log::error('Provider not found: ' . $providerName);
            return 'Provider not found: ' . $provider;
        }

        // Get the pattern details from the database.
        $pattern = $provider->getPatternByName($patternName);

        // If the pattern is not found in the database, log an error and return a message.
        if (!$pattern) {
            Log::error('Pattern not found: ' . $patternName);
            return 'Pattern not found: ' . $pattern;
        }

        // Get the sender information from the provider details.
        $from = $provider->sender;
        // Get the pattern code from the pattern details.
        $patternCode = $pattern->code;
        // Get the API key from the provider details.
        $api = $provider->api;
        // Split the pattern key into an array if it contains commas, otherwise create a single-item array.
        $newKey = strpos($patternKey, ',') !== false ? explode(',', $patternKey) : array($patternKey);
        // Split the pattern value into an array.
        $neValue =  explode(',', $pattern->value);

        try {
            // Combine the pattern value array and the new key array into a single array.
            $value = array_combine($neValue, $newKey);
            // Filter out any empty items from the array.
            $value = array_filter($value, function($item) {
                return !empty($item);
            });
        } catch (\ValueError $e) {
            // If the number of elements in the arrays do not match, return a JSON response with an error message.
            return response()->json(['message' => '  تعداد عناصر در آرایه‌ها یکسان نیست.']);
        }

        // Dispatch the SMS using the dispatchSMS function.
        return $this->dispatchSMS($messages = null, $to, $providerName, $from, $api, $patternCode, $value);
    } else {
        // If SMS sending is not enabled, return a JSON response indicating that SMS is disabled.
        return response()->json(['message' => __("message.smsdisabled")]);
    }
}

// This function is used to dispatch the SMS.

public static function dispatchSMS($messages = null, $to, $providerName, $from, $api, $patternCode, $value)
{
    // Create a new Elanak instance with the recipient, provider, and API key.
    $elanak = Elanak::to($to)->via($providerName)->api($api);

    // If there are messages, send them and set the pattern. Otherwise, just set the pattern.
    if ($messages !== null) {
        $elanak = $elanak->send($messages)->pattern($patternCode, $value);
    } else {
        $elanak = $elanak->pattern($patternCode, $value);
    }

    // If the provider is ippanel or kavenegar, set the sender.
    if (in_array($providerName, ['ippanel', 'kavenegar'])) {
        $elanak = $elanak->from($from);
    }

    // Dispatch the SMS.
    return $elanak->dispatch();
}
