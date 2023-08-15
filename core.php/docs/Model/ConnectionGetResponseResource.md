# # ConnectionGetResponseResource

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | Type, always \&quot;connection\&quot;. |
**id** | **string** | A string that uniquely identifies the user connection. |
**method** | **string** | A string that uniquely identifies the user connections either it is web or openbanking |
**created_date** | **string** | Created date of the connection, available only for SERVER_SCOPE. |
**last_used** | **string** | UTC Date and Time of when the connection was last used, in RFC 3339 format, available only for SERVER_SCOPE. | [optional]
**accounts** | [**\OpenAPI\Client\Model\AccountsContainer**](AccountsContainer.md) |  | [optional]
**institution** | [**\OpenAPI\Client\Model\ConnectionInstitution**](ConnectionInstitution.md) |  |
**profile** | [**\OpenAPI\Client\Model\ConnectionProfile**](ConnectionProfile.md) |  | [optional]
**status** | **string** | Indicates the connection status, available only for SERVER_SCOPE. | [optional]
**links** | [**\OpenAPI\Client\Model\GetConnectionLinks**](GetConnectionLinks.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
