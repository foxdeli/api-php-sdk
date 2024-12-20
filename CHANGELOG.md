
# Change Log
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [1.3.2] - 2024-11-11

### Fixed

- Fixed problem with sending request header `Accept` with `,` instead of `.` in q-factor causing `406 Not Acceptable` error

## [1.3] - 2024-10-31
Here we would have the update steps for 1.3 for people to follow.
More info at [Foxdeli Api Changelog Blog](https://api.foxdeli.com/changelog/addorderfiles)

### Added

- New Endpoint `Foxdeli->uploadFile($orderId, $file)` see [File]([docs/Model/PaymentRequest.md](https://api.foxdeli.com/changelog/addorderfiles))

## [1.2] - 2024-10-17
Here we would have the update steps for 1.2 for people to follow.

### Added

- `PaymentRequest->state` [PaymentRequest](docs/Model/PaymentRequest.md)
- `PaymentRequest->occurred` [PaymentRequest](docs/Model/PaymentRequest.md)
- `PaymentResponse->state` [PaymentRequest](docs/Model/PaymentResponse.md)
- `PaymentRequest->occurred` [PaymentRequest](docs/Model/PaymentResponse.md)
- New Carriers: `FAN_COURIER`, `POST_AG`

### Changed

- `OrderUpdate->payment` from `PaymentRequest` to `PaymentUpdateRequest` [OrderUpdate](docs/Model/OrderUpdate.md)

### Deprecated

- `PaymentRequest->paid` use `state` instead [PaymentRequest](docs/Model/PaymentRequest.md)
- `PaymentResponse->paid` use `state` instead [PaymentRequest](docs/Model/PaymentResponse.md)-
