<script src="../script/hammer.js"></script>
<script src="../script/wptr.js"></script>
<script>
  window.onload = function() {
    WebPullToRefresh.init( {
      loadingFunction: exampleLoadingFunction
    } );
  };
    
    var exampleLoadingFunction = function() {
  return new Promise( function( resolve, reject ) {
    // Run some async loading code here

    if (true/* if the loading worked */ ) {
      resolve();
    } else {
      reject();
    }
  } );
};
</script>