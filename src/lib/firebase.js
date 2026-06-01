import { initializeApp } from 'firebase/app';
import { getMessaging, getToken, onMessage } from 'firebase/messaging';
const firebaseConfig={apiKey:import.meta.env.VITE_FIREBASE_API_KEY,projectId:import.meta.env.VITE_FIREBASE_PROJECT_ID,messagingSenderId:import.meta.env.VITE_FIREBASE_SENDER_ID,appId:import.meta.env.VITE_FIREBASE_APP_ID};
export const firebaseApp=initializeApp(firebaseConfig);
export const messaging=getMessaging(firebaseApp);
export async function requestPushToken(){return getToken(messaging,{vapidKey:import.meta.env.VITE_FIREBASE_VAPID_KEY});}
export function listenPush(handler){return onMessage(messaging,handler);}
