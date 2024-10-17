
# Change Log
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

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
