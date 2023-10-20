
$(document).ready(function() {
    $('#schedule-btn').click(function() {
      $('#schedule-div').removeClass('hidden');
    });
  
    $('#close-btn').click(function() {
      $('#schedule-div').addClass('hidden');
    });


   
  
    // $('#close-btn').click(function() {
    //   $('#schedule-div').addClass('hidden');
    // });
  });
  

  
  $(document).ready(function() {
    // Get the current time
    var currentTime = new Date();
    
    // Loop through each note on the page
    $('.note').each(function() {
      // Get the last update time of the note
      var updateTime = new Date($(this).data('update-time'));
      
      // Calculate the difference between the current time and the last update time
      var diff = currentTime - updateTime;
      
      // Convert the difference to hours
      var diffHours = Math.floor(diff / (1000 * 60 * 60));
      
      // Determine how to format the time based on the difference in hours
      var formattedTime;
      if (diffHours >= 24) {
        formattedTime = Math.floor(diffHours / 24) + ' days ago';
      } else if (diffHours > 1) {
        formattedTime = diffHours + ' hours ago';
      } else {
        formattedTime = '1 hour ago';
      }
      
      // Add the formatted time to the note
      $(this).find('.update-time').text(formattedTime);
    });




  });
  
