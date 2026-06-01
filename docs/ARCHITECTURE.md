# Project Architecture SMWKP

SMWKP menggunakan Clean Architecture dan 4 Layered Architecture.

## Layer

1. **Presentation Layer**: React/Vite pages, reusable components, validation, loading state, error state, empty state, Google Maps widgets, Firebase client.
2. **Business Layer**: API controllers, Laravel services, notifications, queue dispatch, policy checks, request validation.
3. **Data Access Layer**: repository interfaces dan Eloquent repository implementation.
4. **Repository Layer**: Eloquent model dan MySQL schema.

## Modul dan Use Case

- Auth: UC01-UC08 registrasi, login, logout, profile, avatar, forgot/reset password, email verification.
- Kuliner: UC09-UC12 pencarian, detail, maps, favorit.
- Pemilik Usaha: UC13-UC18 pendaftaran usaha, dokumen NIB/KTP/halal, informasi, galeri.
- Review: UC19-UC25 rating, foto, edit/hapus, reply, report.
- Reservasi: UC26-UC30 create, confirm/reject/cancel, history.
- Admin: UC31-UC39 verifikasi usaha/halal, user, category, dashboard, report.
- Notifikasi: UC40-UC43 verification, reservation, review, push notification.

## RBAC

Roles: `admin_dinas`, `pemilik_usaha`, `wisatawan`. Permissions di-seed melalui Spatie Permission dan route dilindungi middleware `role`/`permission` serta Laravel Policy.
