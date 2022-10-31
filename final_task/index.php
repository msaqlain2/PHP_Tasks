<?php
require_once('models/task.class.php');
$obj = new task();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Last Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  </head>
  <body>
  	<div class="container-fluid">
	   <div class="row bg-dark text-light p-1">
      <div class="col-sm-6 col-md-6">
        <span>Company: </span>
      </div> 
     </div>
     <div class="row bg-dark text-light p-1">
      <div class="col-sm-6 col-md-6"> 
        <span>Client: </span>
      </div>
     </div>
     <div class="row bg-dark text-light p-1">
      <div class="col-sm-6 col-md-6">
        <span>Order #: </span>
      </div> 
     </div>
    <form method="POST" id="form">
      <div class="section">
         <h5 class="p-2 mt-2 bg-primary text-light">Step 1: Select Hair Style</h5>
          <div class="row">
            <div class="col-sm-3 col-md-3">
              <div class="form-group">
                <label>Part Side</label>
                <select class="form-select select2bs4" id="part_side" name="part_side">
                </select>
              </div>
            </div>
            <div class="col-sm-3 col-md-3">
              <div class="form-group">
                <label>Volume</label>
                <select class="form-select select2bs4" aria-label="Default select example" id="volume" name="volume">
                </select>
              </div>
            </div>
            <div class="col-sm-3 col-md-3">
              <div class="form-group">
                <label>Part/Crown</label>
                <select class="form-select select2bs4" aria-label="Default select example" id="partorcrown" name="partorcrown">
                </select>
              </div>
            </div>
            <div class="col-sm-3 col-md-3">
              <div class="form-group">
                <label>Material Type</label>
                <select class="form-select select2bs4" aria-label="Default select example" id="material_type" name="material_type">
                </select>
              </div>
            </div> 
          </div>
      </div>
      <div class="section mt-4">
         <h5 class="p-2 mt-2 bg-primary text-light">Step 2: Select Wave/Curl</h5>
         
          <div class="row">
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Front</label>
                <select class="form-select select2bs4" >
                  <option selected disabled>Select Front</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Top</label>
                <select class="form-select select2bs4" aria-label="Default select example" >
                  <option selected disabled>Select Top</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Temple</label>
                <select class="form-select select2bs4" aria-label="Default select example" id="temple">
                  <option selected disabled>Select Temple</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Side</label>
                <select class="form-select select2bs4" aria-label="Default select example" id="side">
                  <option selected disabled>Select Side</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Crown</label>
                <select class="form-select select2bs4" aria-label="Default select example" >
                  <option selected disabled>Select Crown</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Back</label>
                <select class="form-select select2bs4" aria-label="Default select example" >
                  <option selected disabled>Select Back</option>
                </select>
              </div>
            </div> 
          </div>
      </div>
      <div class="section mt-4">
          <h5 class="p-2 mt-2 bg-primary text-light">Step 3: Select Type of Hair</h5>
          <div class="row mt-4">
            <div class="col-sm-4 col-md-4">
              <div class="card">
                <div class="card-header bg-primary text-light">
                  <h5 class="mt-2">Hair Type and Percentage</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>K7</label>
                        <input type="text" name="" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <label>Chinese</label>
                        <input type="text" name="" class="form-control">
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>YAK</label>
                        <input type="text" name="" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <label>Chin/Ind</label>
                        <input type="text" name="" class="form-control">
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        
                        <input type="text" name="" class="form-control" placeholder="European">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        
                        <input type="text" name="" class="form-control" placeholder="Indian">
                    </div>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4">
              <div class="card">
                <div class="card-header bg-primary text-light">
                  <h5 class="mt-2">White Color Type & Percentage</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Synthetic</label>
                        <input type="text" name="" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="Yak">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="PET">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4">
              <div class="card">
                <div class="card-header bg-primary text-light">
                  <h5 class="mt-2">Highlight Hair Type & Percentage</h5>
                </div>
                <div class="card-body">
                  <div class="row mt-4">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="Synthetic">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="Human">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="section mt-4">
         <h5 class="p-2 mt-2 bg-primary text-light">Step 4: Select Hair Length</h5>
          <div class="row">
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Front</label>
                <select class="form-select select2bs4" id="" >
                  <option selected disabled>Select Part Side</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Top</label>
                <select class="form-select select2bs4" aria-label="Default select example" id="">
                  <option selected disabled>Select Top</option>
                  
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Temple</label>
                <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Side</label>
                <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Crown</label>
                <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Back</label>
                <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div> 
          </div>
      </div>
      <div class="section mt-4">
         <h5 class="p-2 mt-2 bg-primary text-light">Step 5: Select Hair Density</h5>
          <div class="row">
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Front</label>
                <select class="form-select select2bs4" id="" >
                  <option selected disabled>Select Part Side</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Top</label>
                <select class="form-select select2bs4" aria-label="Default select example" id="">
                  <option selected disabled>Select Volume</option>
                  
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Temple</label>
                <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Side</label>
                <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Crown</label>
                <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2 col-md-2">
              <div class="form-group">
                <label>Back</label>
                <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div> 
          </div>
      </div>
      <div class="section mt-4">
         <h5 class="p-2 mt-2 bg-primary text-light">Step 6: Select Size Information</h5>
         <div class="row">
          <div class="col-md-7"></div>
           <div class="col-sm-5 col-md-5">
             <span><strong>Hair Color Samples Provided: </strong>none</span>
             <span class="mx-5"><strong>Hair Size: </strong>none</span>
           </div>
         </div>
          <div class="row">
            <div class="col-sm-2 col-md-2 mt-2">
              <div class="form-group">
                <input type="text" name="" placeholder="Cap Size A" class="form-control">
              </div>
            </div>
            <div class="col-sm-2 col-md-2 mt-2">
              <div class="form-group">
                <input type="text" name="" placeholder="Cap Size B" class="form-control">
              </div>
            </div>
            <div class="col-sm-2 col-md-2 mt-2">
              <div class="form-group">
                <input type="text" name="" placeholder="Cap Size C" class="form-control">
              </div>
            </div>
            <div class="col-sm-2 col-md-2 mt-2">
              <div class="form-group">
                <input type="text" name="" placeholder="Cap Size D" class="form-control">
              </div>
            </div>
            <div class="col-sm-2 col-md-2 mt-2">
              <div class="form-group">
                <input type="text" name="" placeholder="Base Width" class="form-control">
              </div>
            </div>
            <div class="col-sm-2 col-md-2 mt-2">
              <div class="form-group">
                <input type="text" name="" placeholder="Base Length" class="form-control">
              </div>
            </div> 
            <div class="row mt-3">
              <div class="col-sm-3 col-md-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Factory Need to find template
                  </label>
                </div>
              </div>
              <div class="col-sm-3 col-md-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Factory Need to find Hair Color
                  </label>
                </div>
              </div>
              <div class="col-sm-3 col-md-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Mold
                  </label>
                </div>
              </div>
              <div class="col-sm-3 col-md-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Template
                  </label>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="section mt-4">
        <h5 class="p-2 mt-2 bg-primary text-light">Step 7: Select Base design & Materials</h5>
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <div class="form-group">
              <label>Model</label>
              <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              <label class="mt-2">Base Design</label>
              <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              <label class="mt-2">Alternative Base</label>
              <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              <label class="mt-2">Size</label>
              <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              <label class="mt-2">Base Color</label>
              <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="form-group">
              <label>Material A</label>
              <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              <label class="mt-2">Material B</label>
              <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              <label class="mt-2">Material C</label>
              <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              <label class="mt-2">Material D</label>
              <select class="form-select select2bs4" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              <label class="mt-2">Base Color</label>
              <input type="text" name="" class="form-control" placeholder="Extra Fronts">
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="form-check mt-4">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Hair Color Provided
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Euro Hair Provided
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Hair Provided
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Hair Piece Sample Provided
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Base Material Provided
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="section mt-4">
        <h5 class="p-2 mt-2 bg-primary text-light">Step 8: Select Tape Materials</h5>
        <div class="row">
          <div class="col-sm-2 col-md-2">
            <label>Tap Size</label>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Front</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Top</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Side</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Crown</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Back</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-sm-2 col-md-2">
            <label>Tap Material</label>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Front</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Top</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Side</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Crown</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Back</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-sm-2 col-md-2">
            <label>Ribbon Size</label>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Front</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Top</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Side</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Crown</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Back</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-sm-2 col-md-2">
            <label>Scallop</label>
            <select class="form-select select2bs4" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Front Lace Distance</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>N Put Template Material</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Clip Type</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2">
            <div class="form-group">
              <label>Clip Size</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2 col-md-2 mt-4">
            <div class="form-group">
              <input type="text" name="" class="form-control" placeholder="Number of Clip">
            </div>
          </div>
        </div>
      <div class="section mt-4">
        <h5 class="p-2 mt-2 bg-primary text-light">Step 9: Under Ventilation</h5>
        <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Front Temple to Temple
              </label>
            </div>  
            <label >Density</label>
            <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
            </select>
            <label class="mt-3">Hair Type</label>
            <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
            </select>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Back Temple to Temple
              </label>
            </div>  
            <label >Density</label>
            <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
            </select>
            <label class="mt-3">Hair Type</label>
            <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
            </select>
          </div>
        </div>
      </div>
      <div class="section mt-4">
        <h5 class="p-2 mt-2 bg-primary text-light">Step 10: Select Hair Color</h5>
        <div class="row ">
          <div class="col-sm-2 col-md-2">
            <span>Gray%</span>
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Front</label>
            <input type="text" name="front" id="front" class="form-control">
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Top</label>
            <input type="text" name="top" id="top" class="form-control">
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Left Temp</label>
            <input type="text" name="left_temp" id="left_temp" class="form-control">
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Right Temp</label>
            <input type="text" name="right_temp" id="right_temp" class="form-control">
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Left Side</label>
            <input type="text" name="left_side" id="left_side" class="form-control">
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-sm-2 col-md-2">
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Right Side</label>
            <input type="text" name="right_side" id="right_side" class="form-control">  
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Crown</label>
            <input type="text" name="crown" id="crown" class="form-control">  
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Back</label>
            <input type="text" name="back" id="back" class="form-control">  
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Total Gray</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>  
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-sm-2 col-md-2">
            <span>Hillite</span>
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Front</label>
            <input type="text" name="" class="form-control">
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Top</label>
            <input type="text" name="" class="form-control">
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Left Temp</label>
            <input type="text" name="" class="form-control">
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Right Temp</label>
            <input type="text" name="" class="form-control">
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Left Side</label>
            <input type="text" name="" class="form-control">
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-sm-2 col-md-2">
            
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Right Side</label>
            <input type="text" name="" class="form-control">  
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Crown</label>
            <input type="text" name="" class="form-control">  
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Back</label>
            <input type="text" name="" class="form-control">  
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Total Hillite</label>
              <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
              </select>  
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-sm-2 col-md-2">
            <span>Hair Color</span>
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Front</label>
            <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
            </select>
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Top</label>
            <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
            </select>
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Left Temp</label>
            <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
            </select>
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Right Temp</label>
            <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
            </select>
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Left Side</label>
            <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
            </select>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-sm-2 col-md-2">
            
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Right Side</label>
            <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
            </select>  
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Crown</label>
            <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
            </select>  
          </div>
          <div class="col-sm-2 col-md-2">
            <label>Back</label>
            <select class="form-select select2bs4" id="" >
                <option selected disabled>Select Part Side</option>
            </select>  
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-sm-6 col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Highlight Frosting
              </label>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Hair Ref Color
              </label>
            </div>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-sm-3 col-md-3 mb-5">
            <button type="submit" class="btn btn-success mt-5">Save Form</button>
            <a href="pdf/index.php" class="btn btn-primary mt-5" target="_blank">Document</a>
        </div>
      </div>
    </form>


	</div>
</body>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
    
  
  </body>
</html>