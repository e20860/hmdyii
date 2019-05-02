$('#imgFile').on('change',function(e){
    var file_data = $('#imgFile').prop('files')[0];
    var formData = new FormData();
    formData.append('imgFile', file_data);
    $.ajax({
        type: 'post',
        url:'/admin/categories/uploadpic',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            // приходит имя файла
            $('#imgCat').attr('src','/web/images/' + data);
            
            if($('#categories-img')){$('#categories-img').val(data);}
            if($('#images-file')){$('#images-file').val(data);}
            
            
        },
        error: function(e){
            console.log(e);
        }
    });  
    e.preventDefault();
    return false;
});