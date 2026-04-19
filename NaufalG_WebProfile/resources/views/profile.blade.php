<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV NGZ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/791ffebf52.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="bg" style="background-image: url('{{ asset('images/office.jpg') }}');"></div>
    <div class="content">
        <div class="icons">
            <div class="icon-brand">
                <i class="fa-brands fa-neos"></i>
                <p>NGZ</p>
            </div>
        </div>

        <div class="cv-card">

            <div class="cv-header">
                <div class="text-container">
                    <table class="info-table">
                        <tr>
                            <td><b>PRAKTIKUM APLIKASI BERBASIS PLATFORM</b></td>
                        </tr>
                        <tr>
                            <td>Tugas Pertemuan 6 Laraval & AJAX</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="footer-bar"></div>

            <div class="cv-data" id="dataCv">

                <div id="ajax-btn">
                    <button>Tampil Data</button>
                </div>

                <h3>Profile 1</h3>
                <ul id="profile-list"></ul>

                <h3>Profile 2</h3>
                <ul id="profile-list2"></ul>

                <h3>Profile 3</h3>
                <ul id="profile-list3"></ul>

            </div>
        </div>
    </div>
    <script>
        document.getElementById('ajax-btn').addEventListener('click', function () {
            const btn = document.getElementById('ajax-btn');
            const cv = document.getElementById('dataCv');
            const profileList = document.getElementById('profile-list');
            const profileList2 = document.getElementById('profile-list2');
            const profileList3 = document.getElementById('profile-list3');
            const expList = document.getElementById('exp-list');

            btn.innerHTML = '<i>Data Telah Ditampilkan</i>';
            btn.disabled = true;

            fetch('/profile')
                .then(response => {
                    if (!response.ok) throw new Error('Gagal mengambil data JSON');
                    return response.json();
                })
                .then(data => {
                    let profileHtml = '';
                    data.profile.forEach(item => {
                        profileHtml += `<li>${item}</li>`;
                    });
                    profileList.innerHTML = profileHtml;

                    let profileHtml2 = '';
                    data.profile2.forEach(item => {
                        profileHtml2 += `<li>${item}</li>`;
                    });
                    profileList2.innerHTML = profileHtml2;

                    let profileHtml3 = '';
                    data.profile3.forEach(item => {
                        profileHtml3 += `<li>${item}</li>`;
                    });
                    profileList3.innerHTML = profileHtml3;

                    cv.style.display = 'block';
                    document.getElementById('ajax-btn').style.display = 'none';
                })
        });
    </script>
</body>

</html>