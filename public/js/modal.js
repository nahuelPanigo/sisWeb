  var confirmation = $('#modal-confirmation', context).dialog({
dialogClass:'delete_confirmation_dialog',
autoOpen: false,
width:400,
minHeight:200,
modal: true,
resizable: false,
buttons: {
  'Cancel': function() {
    // YOUR CODE
    $(this).dialog("close");
  },
  'Continue': function() {
    // YOUR CODE
    $(this).dialog("close");
  },
},
create:function () {
  $(this).closest(".ui-dialog")
    .find(".ui-button:eq(1)") // the second button
    .addClass("continue");
 }
});