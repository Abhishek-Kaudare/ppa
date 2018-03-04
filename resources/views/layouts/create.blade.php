
<form class="form-control-lg" data-toggle="validator" action="{{ route('admin.store') }}" method="POST">

    <div class="form-group ">

        <label class="control-label" for="title">Date:</label>

        <input type="date" name="date" class="form-control" data-error="Please enter date." required />

        <div class="help-block with-errors"></div>

    </div>

    <div class="form-group">

        <label class="control-label" for="title">Received From:</label>

        <input type="text" name="rf" class="form-control" data-error="Please enter details." required />

        <div class="help-block with-errors"></div>

    </div>


    <div class="form-group">

        <label class="control-label" for="title">Brand:</label>

        <input type="text" name="brand" class="form-control" data-error="Please enter details." required />

        <div class="help-block with-errors"></div>

    </div>

    <div class="form-group">

        <label class="control-label" for="title">Quality:</label>

        <input type="text" name="Q" class="form-control" data-error="Please enter details." required />

        <div class="help-block with-errors"></div>

    </div>


    <div class="form-group">

        <label class="control-label" for="title">Gsm:</label>

        <input type="number" name="gsm" class="form-control" data-error="Please enter details." required />

        <div class="help-block with-errors"></div>

    </div>

    <div class="form-group">

        <label class="control-label" for="title">ReelNo.:</label>

        <input type="number" name="reelno" class="form-control" data-error="Please enter details." required />

        <div class="help-block with-errors"></div>

    </div>

    <div class="form-group">

        <label class="control-label" for="title">Gross Wt.:</label>

        <input type="number" name="Gross" class="form-control" data-error="Please enter details." required />

        <div class="help-block with-errors"></div>

    </div>

    <div class="form-group">

        <label class="control-label" for="title">Net Wt.:</label>

        <input type="number" name="net" class="form-control" data-error="Please enter details." required />

        <div class="help-block with-errors"></div>

    </div>

    <div class="form-group ">
        <!-- <label class="control-label" for="title"></label> -->

        <button type="submit" class="btn  btn-success">Submit</button>

    </div>

</form>