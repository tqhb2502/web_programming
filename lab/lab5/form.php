<style>
    .input-form {
        margin-top: 16px;
        margin-left: 16px;
        width: fit-content;
    }
    .input-form > h3 {
        text-align: center;
    }
    .input-form > div {
        margin-bottom: 8px;
    }
    .input-form .button-container {
        text-align: center;
    }
    .input-form label {
        display: inline-block;
        min-width: 100px;
    }
    .input-form input {
        width: 300px;
    }
    .input-form textarea {
        display: block;
        margin-top: 4px;
        width: 404px;
        height: 100px;
    }
    input[type="reset"],
    input[type="submit"] {
        width: 80px;
    }
    .display-label {
        display: block;
        width: 404px;
        margin-top: 48px;
        margin-left: 16px;
        text-align: center;
    }
    .display-form {
        display: block;
        width: 404px;
        margin-left: 16px;
        text-align: center;
    }
</style>

<body>
    <form class="input-form" action="pageSaver.php" method="POST">
        <h3>Page information</h3>
        <div>
            <label>Page number:</label>
            <input type="text" name="pageNumber">
            <br>
        </div>
        <div>
            <label>Title:</label>
            <input type="text" name="title">
            <br>
        </div>
        <div>
            <label>Year created:</label>
            <input type="text" name="yearCreated">
            <br>
        </div>
        <div>
            <label>Copyright:</label>
            <input type="text" name="copyright">
            <br>
        </div>
        <div>
            <label>Content:</label>
            <textarea name="content"></textarea>
            <br>
        </div>
        <div class="button-container">
            <input type="reset" value="Reset">
            <input type="submit" value="Save" name="submitted">
        </div>
    </form>
    
    <h3 class="display-label">Let's see your pages</h3>
    <form class="display-form" action="displayer.php" method="POST">
        <input type="hidden" name="index" value="0">
        <input type="submit" value="Display">
    </form>
</body>