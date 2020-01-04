L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 20,
    id: 'mapbox/streets-v11',
    accessToken: 'pk.eyJ1Ijoid2FuaHV5OTgiLCJhIjoiY2s0OG9pb2ViMTd2ODNrbWxvdzYxMHVxYiJ9.SmkGyA9mZPkrcqxlYiR17Q'
}).addTo(map);