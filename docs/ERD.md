# ERD SMWKP

## Mermaid ER Diagram

```mermaid
erDiagram
  USERS ||--o{ CULINARY_PLACES : owns
  CATEGORIES ||--o{ CULINARY_PLACES : classifies
  CULINARY_PLACES ||--o{ BUSINESS_DOCUMENTS : has
  CULINARY_PLACES ||--o{ HALAL_CERTIFICATES : certifies
  CULINARY_PLACES ||--o{ GALLERIES : displays
  CULINARY_PLACES ||--o{ MENUS : offers
  USERS ||--o{ FAVORITES : saves
  CULINARY_PLACES ||--o{ FAVORITES : saved_by
  USERS ||--o{ REVIEWS : writes
  CULINARY_PLACES ||--o{ REVIEWS : receives
  REVIEWS ||--o{ REVIEW_IMAGES : has
  REVIEWS ||--o{ REVIEW_REPLIES : receives
  REVIEWS ||--o{ REVIEW_REPORTS : reported_as
  USERS ||--o{ REVIEW_REPLIES : replies
  USERS ||--o{ REVIEW_REPORTS : reports
  USERS ||--o{ RESERVATIONS : creates
  CULINARY_PLACES ||--o{ RESERVATIONS : booked_for
  RESERVATIONS ||--o{ RESERVATION_HISTORIES : tracks
  USERS ||--o{ NOTIFICATIONS : receives
  USERS ||--o{ ACTIVITY_LOGS : performs

  USERS {
    bigint id PK
    varchar name
    varchar email UK
    varchar phone
    varchar avatar
    timestamp email_verified_at
    varchar password
    enum status
    varchar remember_token
    timestamps timestamps
    timestamp deleted_at
  }
  CATEGORIES {
    bigint id PK
    varchar name
    varchar slug UK
    text description
    varchar icon
    enum status
    timestamps timestamps
  }
  CULINARY_PLACES {
    bigint id PK
    bigint owner_id FK
    bigint category_id FK
    varchar name
    varchar slug UK
    text description
    text address
    varchar district
    varchar city
    varchar province
    varchar postal_code
    decimal latitude
    decimal longitude
    varchar phone
    varchar website
    decimal average_price
    time open_time
    time close_time
    enum halal_status
    enum verification_status
    boolean featured
    unsignedBigInteger view_count
    decimal rating_average
    unsignedInteger rating_total
    timestamps timestamps
    timestamp deleted_at
  }
  BUSINESS_DOCUMENTS { bigint id PK bigint culinary_place_id FK varchar nib_file varchar ktp_file timestamp uploaded_at }
  HALAL_CERTIFICATES { bigint id PK bigint culinary_place_id FK varchar certificate_number UK varchar certificate_file date issued_date date expired_date enum verification_status }
  GALLERIES { bigint id PK bigint culinary_place_id FK varchar image_path varchar caption integer sort_order }
  MENUS { bigint id PK bigint culinary_place_id FK varchar name text description decimal price varchar image enum status }
  FAVORITES { bigint id PK bigint user_id FK bigint culinary_place_id FK timestamps timestamps }
  REVIEWS { bigint id PK bigint user_id FK bigint culinary_place_id FK tinyint rating text review_text enum status timestamps timestamps }
  REVIEW_IMAGES { bigint id PK bigint review_id FK varchar image_path }
  REVIEW_REPLIES { bigint id PK bigint review_id FK bigint owner_id FK text reply_text timestamps timestamps }
  REVIEW_REPORTS { bigint id PK bigint review_id FK bigint user_id FK varchar reason text description enum status timestamps timestamps }
  RESERVATIONS { bigint id PK bigint user_id FK bigint culinary_place_id FK date reservation_date time reservation_time unsignedSmallInteger guest_count text note enum status bigint confirmed_by FK timestamps timestamps }
  RESERVATION_HISTORIES { bigint id PK bigint reservation_id FK varchar old_status varchar new_status bigint changed_by FK timestamps timestamps }
  NOTIFICATIONS { bigint id PK bigint user_id FK varchar title text message varchar type boolean is_read timestamps timestamps }
  ACTIVITY_LOGS { bigint id PK bigint user_id FK varchar activity varchar module varchar ip_address timestamps timestamps }
```

## SQL Relationship Diagram

```sql
users.id -> culinary_places.owner_id
categories.id -> culinary_places.category_id
culinary_places.id -> business_documents.culinary_place_id
culinary_places.id -> halal_certificates.culinary_place_id
culinary_places.id -> galleries.culinary_place_id
culinary_places.id -> menus.culinary_place_id
users.id -> favorites.user_id
culinary_places.id -> favorites.culinary_place_id
users.id -> reviews.user_id
culinary_places.id -> reviews.culinary_place_id
reviews.id -> review_images.review_id
reviews.id -> review_replies.review_id
users.id -> review_replies.owner_id
reviews.id -> review_reports.review_id
users.id -> review_reports.user_id
users.id -> reservations.user_id
culinary_places.id -> reservations.culinary_place_id
users.id -> reservations.confirmed_by
reservations.id -> reservation_histories.reservation_id
users.id -> reservation_histories.changed_by
users.id -> notifications.user_id
users.id -> activity_logs.user_id
```

## Penjelasan Relasi

User pemilik usaha memiliki banyak `culinary_places`. Category mengelompokkan banyak kuliner. Wisatawan menyimpan kuliner melalui tabel pivot `favorites`, memberi `reviews`, dan membuat `reservations`. Review dapat memiliki foto, balasan owner, serta laporan. Reservasi memiliki histori status untuk audit. Notifikasi dan activity log terikat ke user untuk kebutuhan tracking dan push notification.
