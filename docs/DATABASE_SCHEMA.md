# Database Schema

Semua tabel menggunakan InnoDB, charset utf8mb4, timestamps Laravel, dan foreign key dengan `cascadeOnDelete()` kecuali referensi audit opsional yang memakai `nullOnDelete()`.

## Core Tables

- `users`: email unique, status index, soft delete.
- `roles`, `permissions`, `model_has_roles`, `model_has_permissions`, `role_has_permissions`: disediakan Spatie Permission.
- `categories`: slug unique, status index.
- `culinary_places`: owner/category FK, slug unique, index `verification_status`, `halal_status`, `featured`, `district`, `rating_average`, spatial-like index latitude/longitude.
- `business_documents`: one-to-one per culinary place, `culinary_place_id` unique.
- `halal_certificates`: certificate number unique, status index.
- `galleries`: index place + sort order.
- `menus`: index place + status.
- `favorites`: unique user/place pair.
- `reviews`: unique user/place pair, rating check 1-5, status index.
- `review_images`, `review_replies`, `review_reports`.
- `reservations`: status index, composite date/time index.
- `reservation_histories`: audit status transition.
- `notifications`: user/read/type index.
- `activity_logs`: user/module index.

## Constraints

Business enums are stored as validated enum columns in migrations: user status, category status, halal status, verification status, menu status, review status, report status, reservation status. Rating uses an unsigned tiny integer plus check constraint.
