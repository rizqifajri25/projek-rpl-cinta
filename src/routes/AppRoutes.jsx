import { Routes, Route } from 'react-router-dom';
import Layout from '../components/Layout';
import LandingPage from '../pages/Public/LandingPage';
import ExplorePage from '../pages/Public/ExplorePage';
import CulinaryDetailPage from '../pages/Public/CulinaryDetailPage';
import LoginPage from '../pages/Public/LoginPage';
import RegisterPage from '../pages/Public/RegisterPage';
import DashboardPage from '../pages/User/DashboardPage';
import FavoritesPage from '../pages/User/FavoritesPage';
import ReviewsPage from '../pages/User/ReviewsPage';
import ReservationsPage from '../pages/User/ReservationsPage';
import ProfilePage from '../pages/User/ProfilePage';
import OwnerDashboardPage from '../pages/Owner/DashboardPage';
import OwnerCulinaryPage from '../pages/Owner/CulinaryPage';
import CulinaryFormPage from '../pages/Owner/CulinaryFormPage';
import GalleryPage from '../pages/Owner/GalleryPage';
import OwnerReviewsPage from '../pages/Owner/OwnerReviewsPage';
import OwnerReservationsPage from '../pages/Owner/OwnerReservationsPage';
import AdminDashboardPage from '../pages/Admin/DashboardPage';
import UsersPage from '../pages/Admin/UsersPage';
import CategoriesPage from '../pages/Admin/CategoriesPage';
import CulinaryVerificationPage from '../pages/Admin/CulinaryVerificationPage';
import HalalVerificationPage from '../pages/Admin/HalalVerificationPage';
import ReviewReportsPage from '../pages/Admin/ReviewReportsPage';

export default function AppRoutes() {
  return (
    <Routes>
      <Route element={<Layout />}>
        <Route path="/" element={<LandingPage />} />
        <Route path="/explore" element={<ExplorePage />} />
        <Route path="/culinary/:slug" element={<CulinaryDetailPage />} />
        <Route path="/login" element={<LoginPage />} />
        <Route path="/register" element={<RegisterPage />} />
        <Route path="/dashboard" element={<DashboardPage />} />
        <Route path="/favorites" element={<FavoritesPage />} />
        <Route path="/reviews" element={<ReviewsPage />} />
        <Route path="/reservations" element={<ReservationsPage />} />
        <Route path="/profile" element={<ProfilePage />} />
        <Route path="/owner/dashboard" element={<OwnerDashboardPage />} />
        <Route path="/owner/culinary" element={<OwnerCulinaryPage />} />
        <Route path="/owner/culinary/create" element={<CulinaryFormPage />} />
        <Route path="/owner/culinary/edit/:id" element={<CulinaryFormPage />} />
        <Route path="/owner/gallery" element={<GalleryPage />} />
        <Route path="/owner/reviews" element={<OwnerReviewsPage />} />
        <Route path="/owner/reservations" element={<OwnerReservationsPage />} />
        <Route path="/admin/dashboard" element={<AdminDashboardPage />} />
        <Route path="/admin/users" element={<UsersPage />} />
        <Route path="/admin/categories" element={<CategoriesPage />} />
        <Route path="/admin/culinary-verification" element={<CulinaryVerificationPage />} />
        <Route path="/admin/halal-verification" element={<HalalVerificationPage />} />
        <Route path="/admin/review-reports" element={<ReviewReportsPage />} />
      </Route>
    </Routes>
  );
}
