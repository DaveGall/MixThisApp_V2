




<form class="col-md-6 formDisplay" action="" method="POST"><!--This will post back to the same page. post will also set the input to load into the database.-->
    <label for="firstName">First Name: </label>
    <input type="text" id="firstName" name="firstName" value='<?php echo $result['firstname']; ?>' required><!--Fields are required so I placed required on each input-->
    <label for="lastName">Last Name</label>
    <input id="lastName" type="text" name="lastName" value="<?php echo $result['lastname'];  ?>" required>
    <label for="username">User Name: </label>
    <input type="text" id="username" name="username" value="<?php echo $result['username'];?>" required>
    <label for="email">Email Address: </label>
    <input type="email" id="email" name="email" value='<?php echo $result['email']; ?>' required/>
    <label for="password">Password: </label>
    <input type="password" id="password" name="password" value='<?php echo $result['password']; ?>' required/>
    <input type="submit" name="submit" value="Update User" class="btn-primary button">
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>