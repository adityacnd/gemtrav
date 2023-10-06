function requestNotificationPermission() {
    Notification.requestPermission().then(function (permission) {
        if (permission === "granted") {
            console.log("Izin notifikasi diberikan.");
        }else{
            alert("yahh ga dikasin izin notif nih:V, sayang bangat nanti kalo ketinggalan info promo")
        }
        if (permission === "default") {
            alert("tolong izinin ya")
        }
    });
}
requestNotificationPermission();

function showNotification(title, body) {
    if ('Notification' in window) {
        if (Notification.permission === 'granted') {
            var options = {
                body: body,
                icon: "./logoo.png",
            };

            var notification = new Notification(title, options);

            
            notification.onclick = function() {
                
            };
        }
    }
}


function checkAndSendNotification() {
    var currentHour = new Date().getHours();
    
    if ((currentHour === 6 || currentHour === 9 || currentHour === 12 || (currentHour >= 16 && currentHour <= 18) || currentHour === 21)) {
        var sapaan = currentHour < 12 ? "Selamat Pagi" : "Selamat Sore";
        
        
        var pesanNotifikasi = sapaan + "! Ada promo menarik nih.";

        requestNotificationPermission();
        showNotification("Notifikasi Jam", pesanNotifikasi);
    }
}


setInterval(checkAndSendNotification, 120000); 

document.getElementById('lanjut-belanja').addEventListener('click', function() {
    
    var statusPesanan = "yahh di anggurin aja ni bang:V, dicheckout lah";

    requestNotificationPermission();
    showNotification("Status Pesanan", statusPesanan);
});
document.getElementById('lanjut-pesanan').addEventListener('click', function() {
    
    var statusPesanan = "Sat set sat set bayar langsung liburan";

    requestNotificationPermission();
    showNotification("Status Pesanan", statusPesanan);
});


document.getElementById('newsButton').addEventListener('click', function() {
    
    var beritaTerbaru = "Selamat datang di TravelApp! Dapatkan diskon 10% untuk pemesanan sekarang.";

    requestNotificationPermission();
    showNotification("Berita Terbaru", beritaTerbaru);
});