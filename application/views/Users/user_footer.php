 <?php echo $this->pagination->create_links(); ?>
 </section>
 <!-- Optional JavaScript; choose one of the two! -->

 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
     $(document).ready(function() {
         $("#myInput").on("keyup", function() {
             var value = $(this).val().toLowerCase();
             $("#myDIV *").filter(function() {
                 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
         });
     });
 </script>
 </body>

 </html>