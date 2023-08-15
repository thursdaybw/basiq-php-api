# # IdentityData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | Type, always \&quot;identity\&quot;. |
**id** | **string** | Identity identification. |
**created** | **string** | Created date of the identity. |
**updated** | **string** | Created date of the identity. |
**links** | [**\OpenAPI\Client\Model\IdentityLinks**](IdentityLinks.md) |  |
**source** | **string** | Data source. | [optional]
**full_name** | **string** | FullName of the identity owner. | [optional]
**first_name** | **string** | FirstName of the identity owner. | [optional]
**last_name** | **string** | LastName of the identity owner. | [optional]
**middle_name** | **string** | MiddleName of the identity owner. | [optional]
**title** | **string** | Title is the prefix to the name of the identity owner. | [optional]
**dob** | **string** | Date of birth of the identity owner. | [optional]
**occupation_code** | **string** | Code relating to the occupation held by the identity owner. | [optional]
**occupation_code_version** | **string** | Occupation Code Version. | [optional]
**phone_numbers** | **string[]** | List of phone numbers of the identity owner. | [optional]
**emails** | **string[]** | List of email addresses of the identity owner. | [optional]
**physical_addresses** | [**\OpenAPI\Client\Model\PhysicalAddressData[]**](PhysicalAddressData.md) | List of physical addresses of the identity owner. | [optional]
**organisation** | [**\OpenAPI\Client\Model\IdentityDataOrganisation**](IdentityDataOrganisation.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
