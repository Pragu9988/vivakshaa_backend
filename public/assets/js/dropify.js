$(function() {
  'use strict';

  $('#myDropify').dropify();
  $('.courseCover').dropify({
    messages: {
      'default': 'Drag and drop a file here or click',
      'replace': 'Drag and drop or click to replace',
      'remove':  'Remove',
      'error':   'Ooops, something wrong happended.'
  }
  });
  $('.dropifyFile').dropify({
    messages: {
      'default': 'Drag and drop a file here or click',
      'replace': 'Drag and drop or click to replace',
      'remove':  'Remove',
      'error':   'Ooops, something wrong happended.'
  }
  });
  $('#myDropifyPan').dropify({
    messages: {
      'default': 'Drag and drop a file here or click',
      'replace': 'Drag and drop or click to replace',
      'remove':  'Remove',
      'error':   'Ooops, something wrong happended.'
  }
  });
});