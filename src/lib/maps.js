export const palembangCenter={lat:-2.9761,lng:104.7754};
export function buildDirectionUrl(destination){return `https://www.google.com/maps/dir/?api=1&destination=${destination.lat},${destination.lng}&travelmode=driving`;}
export function distanceKm(a,b){const R=6371,dLat=(b.lat-a.lat)*Math.PI/180,dLng=(b.lng-a.lng)*Math.PI/180;const x=Math.sin(dLat/2)**2+Math.cos(a.lat*Math.PI/180)*Math.cos(b.lat*Math.PI/180)*Math.sin(dLng/2)**2;return +(2*R*Math.atan2(Math.sqrt(x),Math.sqrt(1-x))).toFixed(2);}
