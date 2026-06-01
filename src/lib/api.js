import axios from 'axios';
export const api=axios.create({baseURL:import.meta.env.VITE_API_URL||'/api',headers:{Accept:'application/json'}});
api.interceptors.request.use((config)=>{const token=localStorage.getItem('smwkp_token');if(token)config.headers.Authorization=`Bearer ${token}`;return config;});
export const endpoints={login:'/login',register:'/register',culinary:'/culinary',categories:'/categories',favorites:'/favorites',reviews:'/reviews',reservations:'/reservations',notifications:'/notifications'};
