    <?php 

    //database_connection.php

    $connect = new PDO("mysql:host=localhost;dbname=ecomm", "root", "");

    ?>
    <head>

    <style type="text/css">
    /**********************************************************GENERAL***************************************************************************/
    #loading
    {
    text-align:center; 
    background: url('./images/loader.gif') no-repeat center; 
    height: 150px;
    }
    .slider-selection {
    background: #f77500 !important;
    }
    .slider-success .slider-selection {
    background-color: #5cb85c !important;
    }
    .slider-primary .slider-selection {
    background-color: #428bca !important;
    }
    .slider-info .slider-selection {
    background-color: #5bc0de !important;
    }
    .slider-warning .slider-selection {
    background-color: #f0ad4e !important;
    }
    .slider-danger .slider-selection {
    background-color: #d9534f !important;
    }
    .slider.slider-horizontal {
    width: 100% !important;
    height: 20px;
    }
    .slider-handle {
    background-color: #fff !important;
    background-image: none !important;
    -webkit-box-shadow: 1px 1px 24px -2px rgba(0,0,0,0.75) !important;
    -moz-box-shadow: 1px 1px 24px -2px rgba(0,0,0,0.75) !important;
    box-shadow: 1px 1px 24px -2px rgba(0,0,0,0.75) !important;
    }

    .slider-strips .slider-selection {
    background-image: repeating-linear-gradient(-45deg, transparent, transparent 5px, rgba(255,252,252,0.08) 5px, rgba(252,252,252,0.08) 10px) !important;
    background-image: -ms-repeating-linear-gradient(-45deg, transparent, transparent 5px, rgba(255,252,252,0.08) 5px, rgba(252,252,252,0.08) 10px) !important;
    background-image: -o-repeating-linear-gradient(-45deg, transparent, transparent 5px, rgba(255,252,252,0.08) 5px, rgba(252,252,252,0.08) 10px) !important;
    background-image: -webkit-repeating-linear-gradient(-45deg, transparent, transparent 5px, rgba(255,252,252,0.08) 5px, rgba(252,252,252,0.08) 10px) !important; 
    }

/* The container */
.container-checkbox {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container-checkbox input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.container-checkbox .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    BORDER-RADIUS:50%;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container-checkbox:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container-checkbox input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.container-checkbox .checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container-checkbox input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container-checkbox .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}

.text-primary{
    padding:20px;
}
    </style>

    <link rel="stylesheet" href="range.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
    <script src="https://use.fontawesome.com/fd9dba5260.js"></script>
    <script src="range.js"></script>
    </head>
    <body>
    <div class="container-fluid" style="background-color: #251e35">
    <h5 style="text-transform: uppercase;font-weight: bolder;color:white" class="text-primary">Brand</h5>

    <?php

    $query = "SELECT DISTINCT brand FROM products ORDER BY brand
    ";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
    ?>
    <label class="container-checkbox"> <span style="font-size:14px;color:white"><?php echo $row['brand']; ?></span>
  <input type="checkbox" >
  <span class="checkmark"></span>
</label>
    <?php    
    }

    ?>

    <h5 style="text-transform: uppercase;font-weight: bolder;color:white" class="text-primary">Category</h5>

    <div class="list-group">
    <?php

    $query = "SELECT DISTINCT cat_slug FROM category ORDER BY cat_slug
    ";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
    ?>
    <label class="container-checkbox"> <span style="font-size:14px;color:white"><?php echo $row['cat_slug']; ?></span>
  <input type="checkbox" >
  <span class="checkmark"></span>
</label>
    <?php    
    }

    ?>
    </div>


    <h5 style="text-transform: uppercase;font-weight: bolder;color:white" class="text-primary">Color</h5>

    <div class="list-group">
    <?php

    $query = "SELECT DISTINCT color FROM products ORDER BY color
    ";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
    ?>
   <label class="container-checkbox"> <span style="font-size:14px;color:white"><?php echo $row['color']; ?></span>
  <input type="checkbox" >
  <span class="checkmark"></span>
</label>
    <?php    
    }

    ?>
    </div>

    <h5 style="text-transform: uppercase;font-weight: bolder;color:white" class="text-primary">Discount</h5>

    <div class="list-group">
    <?php

    $query = "SELECT DISTINCT discount FROM products ORDER BY discount
    ";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
    ?>
   <label class="container-checkbox"> <span style="font-size:14px;color:white"><?php echo $row['discount']; ?>  OFF</span>
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
    <?php    
    }

    ?>
    </div>


    </div>
    <script type="text/javascript">
    (function( $ ){
    $( document ).ready( function() {
    $( '.input-range').each(function(){
    var value = $(this).attr('data-slider-value');
    var separator = value.indexOf(',');
    if( separator !== -1 ){
    value = value.split(',');
    value.forEach(function(item, i, arr) {
    arr[ i ] = parseFloat( item );
    });
    } else {
    value = parseFloat( value );
    }
    $( this ).slider({
    formatter: function(value) {
    console.log(value);
    return '$' + value;
    },
    min: parseFloat( $( this ).attr('data-slider-min') ),
    max: parseFloat( $( this ).attr('data-slider-max') ), 
    range: $( this ).attr('data-slider-range'),
    value: value,
    tooltip_split: $( this ).attr('data-slider-tooltip_split'),
    tooltip: $( this ).attr('data-slider-tooltip')
    });
    });

    } );
    } )( jQuery );
    </script>
    </body>