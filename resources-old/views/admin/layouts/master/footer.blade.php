<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<!-- New Added -->

<script src="//cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/2.0.1/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    }); //=== end of doc ready
</script>

<script>
    $(document).ready(function() {
        // Initialize select2
        $('#work1, #work2').select2();

        // Function to disable selected option in the other dropdown
        function disableSelectedOption(selectedDropdown, otherDropdown) {
            var selectedOption = $(selectedDropdown).val();

            // Enable all options in the other dropdown
            $(otherDropdown + ' option').prop('disabled', false);

            // Disable the selected option in the other dropdown
            if (selectedOption) {
                $(otherDropdown + ' option[value=' + selectedOption + ']').prop('disabled', true);
            }

            // Refresh the select2
            $(otherDropdown).select2();
        }

        // On change of work1
        $('#work1').on('change', function() {
            disableSelectedOption('#work1', '#work2');
            // Store selected value in local storage
            localStorage.setItem('selectedWork1', $(this).val());
        });

        // On change of work2
        $('#work2').on('change', function() {
            disableSelectedOption('#work2', '#work1');
            // Store selected value in local storage
            localStorage.setItem('selectedWork2', $(this).val());
        });

        // Get selected values from local storage
        var selectedWork1 = localStorage.getItem('selectedWork1');
        var selectedWork2 = localStorage.getItem('selectedWork2');

        // Set selected values in dropdowns
        if (selectedWork1) {
            $('#work1').val(selectedWork1).trigger('change');
        }
        if (selectedWork2) {
            $('#work2').val(selectedWork2).trigger('change');
        }
        $(window).on('beforeunload', function() {
            localStorage.removeItem('selectedWork1');
            localStorage.removeItem('selectedWork2');
        });
    });
</script>
<script>
    function copyContent() {
        var textarea = document.createElement('textarea');

        textarea.value = document.getElementById('copyContent').innerText;

        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');

        document.body.removeChild(textarea);

        alert('Content copied to clipboard!');
    }



</script>


<script>

   // Submit form using AJAX
    $('#addExperienceForm').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: "{{ route('work.store') }}",
            data: formData,
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    console.log('Experience added successfully:', data);
                    $('.close1').click();
 

                    var newExperienceId = data.data.id;

                    $('#work1').append($('<option>', {
                        value: newExperienceId,
                        text: data.data.name
                    })).val(newExperienceId);
                    removevalues();
                } else {
                    console.log('Error adding experience:', data.error);
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX request failed:', status, error);
            }
        });
    });

          
      function removevalues(){
          $('#name').val('');
          $('#type').val('');
          $('#description').val('');
          $('#url').val('');
      }

    $('#addExperienceForm2').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: "{{ route('work.store') }}",
            data: formData,
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    console.log('Experience added successfully:', data);    
                    $('.close1').click();

                    var newExperienceId = data.data.id;
                  
                    $('#work2').append($('<option>', {
                        value: newExperienceId,
                        text: data.data.name
                    })).val(newExperienceId);
                    removevalues();
                } else {
                    console.log('Error adding experience:', data.error);
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX request failed:', status, error);
            }
        });
    });
  
    function removevalues(){
        $('#name').val('');
        $('#type').val('');
        $('#description').val('');
        $('#url').val('');
    }
</script>
