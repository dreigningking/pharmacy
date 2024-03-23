@foreach ($histories as $history)
<div class="row my-4 condition">
    <div class="col-md-4">
        <div class="form-group">  
            <label class="text-muted text-center">Previous Medical Condition</label>                                        
            <input type="text" value="" placeholder="Condition name" class=" form-control">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">  
            <label class="text-muted text-center">When did it happen</label>    
            <div class="input-group">
                <input type="number" placeholder="Year. e.g 2023" class="form-control">
                <div class="input-group-append">
                    <select class="form-control" >
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                </div>
            </div>                                    
            
        </div>
    </div>
    <div class="col-md-3">
        <label class="d-md-block d-sm-none d-none">&nbsp;</label>
            <button type="button" class="btn btn-primary add_condition" title="add more"><i class="fa fa-plus"></i></button>
    </div>
    <div class="col-md-12 medications">
        <div class="med mb-1">
            <input type="text" value="" placeholder="Medication used" class="form-control-sm"> 
            <label class="form-check-label mx-3">Effective? </label>
            <label class="form-check-label mx-3">
                <input type="radio" class="form-check-input">Yes
            </label>
            <label class="form-check-label mx-3">
                <input type="radio" class="form-check-input">No
            </label>
            <button type="button" class="btn btn-sm btn-info add_medication" title="add more"><i class="fa fa-plus"></i></button>
        </div>
        
    </div>
</div>
@endforeach
<div class="row my-4 condition">
    <div class="col-md-4">
        <div class="form-group">  
            <label class="text-muted text-center">Previous Medical Condition</label>                                        
            <select type="text" name="previous_history['condition']" placeholder="Condition name" class=" form-control">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">  
            <label class="text-muted text-center">When did it happen</label>    
            <div class="input-group">
                <input type="number" name="previous_history['year']" placeholder="Year. e.g 2023" class="form-control">
                <div class="input-group-append">
                    <select class="form-control" name="previous_history['month']">
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                </div>
            </div>                                    
            
        </div>
    </div>
    <div class="col-md-3">
        <label class="d-md-block d-sm-none d-none">&nbsp;</label>
            <button type="button" class="btn btn-primary add_condition" title="add more"><i class="fa fa-plus"></i></button>
    </div>
    <div class="col-md-12 medications">
        <div class="med mb-1">
            <input type="text" name="previous_history['medicine']" placeholder="Medication used" class="form-control-sm"> 
            <label class="form-check-label mx-3">Effective? </label>
            <label class="form-check-label mx-3">
                <input type="radio" class="form-check-input" name="previous_history['medicine_effectiveness']">Yes
            </label>
            <label class="form-check-label mx-3">
                <input type="radio" class="form-check-input" name="previous_history['medicine_effectiveness']">No
            </label>
            <button type="button" class="btn btn-sm btn-info add_medication" title="add more"><i class="fa fa-plus"></i></button>
        </div>
        
    </div>
</div>
                