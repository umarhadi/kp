</div>
<script src="assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/dist/js/dropdown-bootstrap-extended.js"></script>
<script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/dist/js/dataTables-data.js"></script>
<script src="assets/dist/js/init.js"></script>
<script src="assets/dist/js/home-data.js"></script>
<!-- <script>
    $(document).ready(function() {
        $("#cari").change(function() {
            $.ajax({
                type: "POST",
                url: "admin/kasir/fungsi/edit/edit.php?cari_barang=yes",
                data: 'keyword=' + $(this).val(),
                beforeSend: function() {
                    $("#hasil_cari").hide();
                    $("#tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
                },
                success: function(html) {
                    $("#tunggu").html('');
                    $("#hasil_cari").show();
                    $("#hasil_cari").html(html);
                },
            });
        });
    });
    $("#hapus_cari").click(function() {
        $("#hasil_cari").hide();
        $("#cari").show();
    });
</script> -->
<script>  
 $(document).ready(function(){  
      $('#cari').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"komponen/search-bar.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#hasil_cari').fadeIn();  
                          $('#hasil_cari').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#cari').val($(this).text());  
           $('#hasil_cari').fadeOut();  
      });  
 });  
 </script>
<script>
    $(document).ready(function() {
        $('.detail_barang').click(function() {
            var detail_barang = $(this).attr("id");
            $.ajax({
                url: "admin/kasir/fungsi/view/modal-barang.php",
                method: "post",
                data: {
                    detail_barang: detail_barang
                },
                success: function(data) {
                    $('#detail').html(data);
                    $('#modalDetail').modal("show");
                }
            });
        });
    });
</script>
</body>