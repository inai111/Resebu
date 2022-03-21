const base_url = 'http://127.0.0.1:8000/';
// console.log(`${base_url}`)
$('#pencarians').keyup(function (e) {
    let _token = $('meta[name="csrf-token"]').attr('content');
    // e.preventDefault();
    var hac = '';
    $.ajax({
        type: 'post',
        url: base_url + 'pencarian2',
        data: {
            _token: _token,
            pencarian: $(this).val(),
        },
        dataType: 'json',
        success: function (datas) {
            console.log(datas.datas);
            datas.datas.forEach(element => {
                var date = new Date(element.created_at);
                hac += `
            <div class="col-md-4 col-lg-4 me-md-auto col-sm-4 col-4 mb-3 text-center">
                <div class="col-lg-11 p-5 mx-auto border">
                    <a href=" /watch/${element.id}" class="nav-link w-100">
                        <img class="img-fluid card-img" src="${base_url}storage/images/${element.gambar}" alt="">
                    </a>
                </div>
                <a href="/watch/${element.id}" class="nav-link">
                    <h5 class="m-0">${element.nama}</h5>
                </a>
                <p class="lh-1"><small>oleh ${datas.user.find(e => e.id === element.id_user).nama}<br>diupload pada
                        ${date.toLocaleDateString()}</small></p>
            </div>
            
            `;
            });
            $('#yangIni').html(hac);
        }

    });
})