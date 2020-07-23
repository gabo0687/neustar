$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
    //Function adding Countries	
    var frm = $('#add_form');
    frm.submit(function (e) {

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: frm.attr('action'),
            data: frm.serialize(), // serializes the form's elements.
            success: function (data)
            {   
               $('.close').click();
               location.reload(); 
            }
        });

    });
    
    //Function deleting a country
      var frm_delete = $('#delete_form');
    frm_delete.submit(function (e) {

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: frm_delete.attr('action'),
            data: frm_delete.serialize(), // serializes the form's elements.
            success: function (data_delete)
            {   
               $('.close_delete').click();
               location.reload(); 
            }
        });

    });
    
    $( ".code-delete" ).click(function(){
     $("#countryId").val($(this).data('id'));
    });
        
});

function openView(modal,CountryCode){
     $.ajax({
            type: "POST",
            url: 'Pages/countrydetail',
            data: 'CountryCode='+CountryCode,// serializes the form's elements.
            success: function (data)
            {   
              $('#viewCountry').html(data);  
              $('#'+modal).modal('show');
            }
        });
    
}