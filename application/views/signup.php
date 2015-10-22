

<div class="" id="contact_modal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title title" id="myModalLabel">Mix This</h1>
                <p class="modal-text">Sign Up</p>
            </div>
            <div class="modal-body">
                <form class="col-md-6 formDisplay" action="<?php echo base_url(); ?>index.php/blog/addUser/" method="POST"><!--This will post back to the same page. post will also set the input to load into the database.-->
                    <label for="firstName">First Name: </label>
                    <input type="text" id="firstName" name="firstName" placeholder="" required><!--Fields are required so I placed required on each input-->
                    <label for="lastName">Last Name: </label>
                    <input type="text" id="lastName" name="lastName" placeholder="" required>
                    <label for="username">User Name: </label>
                    <input type="text" id="username" name="username" placeholder="" required>
                    <label for="email">Email Address: </label>
                    <input type="email" id="email" name="email" placeholder="" required/>
                    <label for="password">Password </label>
                    <input type="password" id="password" name="password" placeholder="" required/>
                    <input type="submit" id="modalButLeft" name="submit" value="Sign Up" class="btn-primary button">
                    <button type="button" id="modalButRight" class="btn" data-dismiss="modal">Close</button>
                </form>
            </div>
            <div class="modal-footer">


            </div>
        </div>
    </div>


</div>