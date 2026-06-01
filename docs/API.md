# REST API

All protected endpoints use Sanctum bearer token. Admin endpoints require `role:admin_dinas`; owner endpoints require `role:pemilik_usaha`; tourist user endpoints require authenticated active users.

## Auth
- `POST /api/register`
- `POST /api/login`
- `POST /api/logout`
- `POST /api/forgot-password`
- `POST /api/reset-password`
- `GET /api/profile`
- `PUT /api/profile`
- `POST /api/profile/avatar`
- `POST /api/email/verification-notification`

## Category
- `GET /api/categories`
- `POST /api/admin/categories`
- `PUT /api/admin/categories/{category}`
- `DELETE /api/admin/categories/{category}`

## Culinary
- `GET /api/culinary`
- `GET /api/culinary/{culinaryPlace}`
- `POST /api/owner/culinary`
- `PUT /api/owner/culinary/{culinaryPlace}`
- `DELETE /api/owner/culinary/{culinaryPlace}`
- `POST /api/owner/culinary/{culinaryPlace}/documents`
- `POST /api/owner/culinary/{culinaryPlace}/halal-certificate`
- `POST /api/owner/culinary/{culinaryPlace}/gallery`
- `POST /api/admin/verify-culinary/{culinaryPlace}`
- `POST /api/admin/verify-halal/{halalCertificate}`

## Favorite
- `POST /api/favorites`
- `DELETE /api/favorites/{favorite}`
- `GET /api/favorites`

## Review
- `POST /api/reviews`
- `PUT /api/reviews/{review}`
- `DELETE /api/reviews/{review}`
- `POST /api/reviews/{review}/images`
- `POST /api/reviews/report`
- `POST /api/reviews/reply`

## Reservation
- `POST /api/reservations`
- `GET /api/reservations`
- `PUT /api/reservations/{reservation}`
- `DELETE /api/reservations/{reservation}`
- `POST /api/reservations/confirm`
- `POST /api/reservations/reject`

## Notification
- `GET /api/notifications`
- `PUT /api/notifications/read`

## Admin Dashboard
- `GET /api/admin/dashboard`
