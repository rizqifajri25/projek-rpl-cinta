import { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import { api } from '../../lib/api';
import GoogleMapPanel from '../../components/maps/GoogleMapPanel';
import ReservationForm from '../../components/forms/ReservationForm';
import StateBlock from '../../components/ui/StateBlock';

export default function CulinaryDetailPage() {
  const { slug } = useParams();

  const [p, setP] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    api
      .get('/culinary/' + slug)
      .then((r) => setP(r.data))
      .finally(() => setLoading(false));
  }, [slug]);

  return (
    <StateBlock loading={loading} empty={!p}>
      {p && (
        <div className="space-y-6">

          {/* Header */}
          <section className="card p-6">
            <span className="badge">
              {p.halal_status}
            </span>

            <h1 className="text-4xl font-black mt-2">
              {p.name}
            </h1>

            <p className="mt-4">
              {p.description}
            </p>
          </section>

          {/* Informasi */}
          <section className="card p-6">
            <h2 className="text-2xl font-bold mb-4">
              Informasi Kuliner
            </h2>

            <div className="grid md:grid-cols-2 gap-3">
              <p><strong>Kategori:</strong> {p.category?.name}</p>
              <p><strong>Telepon:</strong> {p.phone}</p>
              <p><strong>Kecamatan:</strong> {p.district}</p>
              <p><strong>Kota:</strong> {p.city}</p>
              <p><strong>Provinsi:</strong> {p.province}</p>
              <p><strong>Kode Pos:</strong> {p.postal_code}</p>

              <p>
                <strong>Jam Operasional:</strong>{' '}
                {p.open_time} - {p.close_time}
              </p>

              <p>
                <strong>Harga Rata-rata:</strong>{' '}
                Rp {Number(p.average_price).toLocaleString('id-ID')}
              </p>

              <p>
                <strong>Rating:</strong>{' '}
                ⭐ {p.rating_average}
              </p>

              <p>
                <strong>Total Review:</strong>{' '}
                {p.rating_total}
              </p>
            </div>

            <div className="mt-4">
              <strong>Alamat:</strong>
              <p>{p.address}</p>
            </div>
          </section>

          {/* Galeri */}
          {p.galleries?.length > 0 && (
            <section className="card p-6">
              <h2 className="text-2xl font-bold mb-4">
                Galeri Foto
              </h2>

              <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
                {p.galleries.map((g) => (
                  <div key={g.id}>
                    <img
                      src={`http://127.0.0.1:8000/storage/${g.image_path}`}
                      alt={g.caption}
                      className="rounded-lg w-full h-40 object-cover"
                    />

                    <p className="text-sm mt-2">
                      {g.caption}
                    </p>
                  </div>
                ))}
              </div>
            </section>
          )}

          {/* Menu */}
          {p.menus?.length > 0 && (
            <section className="card p-6">
              <h2 className="text-2xl font-bold mb-4">
                Menu Unggulan
              </h2>

              <div className="space-y-4">
                {p.menus.map((menu) => (
                  <div
                    key={menu.id}
                    className="border rounded-lg p-4"
                  >
                    <h3 className="font-bold text-lg">
                      {menu.name}
                    </h3>

                    <p className="text-sm">
                      {menu.description}
                    </p>

                    <p className="font-semibold mt-2">
                      Rp {Number(menu.price).toLocaleString('id-ID')}
                    </p>
                  </div>
                ))}
              </div>
            </section>
          )}

          {/* Review */}
          {p.reviews?.length > 0 && (
            <section className="card p-6">
              <h2 className="text-2xl font-bold mb-4">
                Ulasan Pengunjung
              </h2>

              <div className="space-y-4">
                {p.reviews.map((review) => (
                  <div
                    key={review.id}
                    className="border rounded-lg p-4"
                  >
                    <p className="font-bold">
                      {review.user?.name}
                    </p>

                    <p>
                      ⭐ {review.rating}/5
                    </p>

                    <p className="mt-2">
                      {review.review_text}
                    </p>
                  </div>
                ))}
              </div>
            </section>
          )}

          {/* Peta */}
          <GoogleMapPanel selected={p} />

          {/* Reservasi */}
          <ReservationForm culinaryPlaceId={p.id} />

        </div>
      )}
    </StateBlock>
  );
}