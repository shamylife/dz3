<form action="/add/create" method="POST">
    <div class="form-group">
        <label for="filename">Add file name:</label>
        <input type="text" class="form-control" name="name" id="filename" placeholder="File name(*.txt)" value="">
    </div>

    <div class="form-group">
        <label for="fileContent">Add content:</label>
        <textarea class="form-control" name="content" id="fileContent" rows="10"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        <span class="glyphicon glyphicon glyphicon-plus" ></span>&nbsp Add file
    </button>
</form>
