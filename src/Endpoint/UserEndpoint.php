<?php

namespace BasiqPhpApi\Endpoint;

class UserEndpoint extends EndpointBase implements EndpointInterface {

    /**
     * Fetches user information from the Basiq API.
     *
     * @param string $userId
     *   The ID of the user to fetch.
     *
     * @return \stdClass The user object containing user details.
     */
    public function fetchUser(string $userId): \stdClass {
        return (object) $this->request('GET', "/users/{$userId}");
    }

    /**
     * Fetches accounts associated with a specific user from the Basiq API.
     *
     * @param string $userId
     *   The ID of the user whose accounts are to be fetched.
     *
     * @return array An array of account objects.
     */
    public function fetchUserAccounts(string $userId): array {
        return $this->request('GET', "/users/{$userId}/accounts");
    }

    /**
     * Fetches a specific user's account using the account URL.
     *
     * @param string $accountUrl
     *   The URL of the account to fetch.
     *
     * @return ?array
     *   An array containing account details.
     */
    public function fetchUsersAccount(string $accountUrl): ?array {
        // Parse the URL to get the path and query parts.
        $parsedUrl = parse_url($accountUrl);
        $relativeUrl = $parsedUrl['path'] . (isset($parsedUrl['query']) ? '?' . $parsedUrl['query'] : '');

        return $this->request('GET', $relativeUrl);
    }

    /**
     * Fetches consents associated with a specific user from the Basiq API.
     *
     * @param string $userId
     *   The ID of the user whose consents are to be fetched.
     *
     * @return ?array An array of consent objects.
     */
    public function fetchUserConsents(string $userId): ?array {
        return $this->request('GET', "/users/{$userId}/consents");
    }
}