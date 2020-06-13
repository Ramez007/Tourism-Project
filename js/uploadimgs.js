const   photoSelector =     document.getElementById('photoSelector');

photoSelector.addEventListener('change',function () {
    let row = imgRow.innerHTML;
    row = '';

    if(this.files.length > 10){
        imgRow.innerHTML = '<h6 style="color: red;">Please select 10 files only !</h6>';
        return;
    };
    for (var i = 0; i < photoSelector.files.length; ++i){
        let name = photoSelector.files.item(i).name;
        const ImageUrl = window.URL.createObjectURL(photoSelector.files[i]);
        row = row + 
        `<div class = "col uploaderImg" style = "margin: 0.5rem ;padding: 0.4rem; background-color: gray; width:100%">
            <div>
            <img src="${ImageUrl}" class="rounded mx-auto d-block img-fluid galleryImg" alt="Responsive image" ;"="" style="background-color: rgb(65, 70, 61);height: 10rem;object-fit: scale-down;">
            </div>
            <div style = "margin-top: 0.5rem;">
            
            <div class="form-check">
                <input class="form-check-input" type="radio" name="imgPrimary" id="imgPrimary${i}" value="${photoSelector.files[i].name}" checked>
                <input type="hidden" value="${photoSelector.files[i].name}" name="imgname[]">
                <label class="form-check-label" style="color: white;" for="imgPrimary${i}">Set as primary</label>
            </div>
                
            </div>
            
        </div>`
        // URL.revokeObjectURL(objectURL);
    }
    imgRow.innerHTML = row;   
});

//======================================================================================================================================================

const   photoSelector2 =     document.getElementById('photoSelector2');

photoSelector2.addEventListener('change',function () {
    let row = imgRow2.innerHTML;
    row = '';

    if(this.files.length > 10){
        imgRow2.innerHTML = '<h6 style="color: red;">Please select 10 files only !</h6>';
        return;
    };
    for (var i = 0; i < photoSelector2.files.length; ++i){
        let name = photoSelector2.files.item(i).name;
        const ImageUrl = window.URL.createObjectURL(photoSelector2.files[i]);
        row = row + 
        `<div class = "col uploaderImg" style = "margin: 0.5rem ;padding: 0.4rem; background-color: gray; width:100%">
            <div>
            <img src="${ImageUrl}" class="rounded mx-auto d-block img-fluid galleryImg" alt="Responsive image" ;"="" style="background-color: rgb(65, 70, 61);height: 10rem;object-fit: scale-down;">
            </div>
            <div style = "margin-top: 0.5rem;">
            
            <div class="form-check">
                <input class="form-check-input" type="radio" name="imgPrimary" id="imgPrimary${i}" value="${photoSelector2.files[i].name}" checked>
                <input type="hidden" value="${photoSelector2.files[i].name}" name="imgname[]">
                <label class="form-check-label" style="color: white;" for="imgPrimary${i}">Set as primary</label>
            </div>
                
            </div>
            
        </div>`
        // URL.revokeObjectURL(objectURL);
    }
    imgRow2.innerHTML = row;   
});

//===========================================================================================================================================

const   photoSelector3 =     document.getElementById('photoSelector3');

photoSelector3.addEventListener('change',function () {
    let row = imgRow3.innerHTML;
    row = '';

    if(this.files.length > 10){
        imgRow3.innerHTML = '<h6 style="color: red;">Please select 10 files only !</h6>';
        return;
    };
    for (var i = 0; i < photoSelector3.files.length; ++i){
        let name = photoSelector3.files.item(i).name;
        const ImageUrl = window.URL.createObjectURL(photoSelector3.files[i]);
        row = row + 
        `<div class = "col uploaderImg" style = "margin: 0.5rem ;padding: 0.4rem; background-color: gray; width:100%">
            <div>
            <img src="${ImageUrl}" class="rounded mx-auto d-block img-fluid galleryImg" alt="Responsive image" ;"="" style="background-color: rgb(65, 70, 61);height: 10rem;object-fit: scale-down;">
            </div>
            <div style = "margin-top: 0.5rem;">
            
            <div class="form-check">
                <input class="form-check-input" type="radio" name="imgPrimary" id="imgPrimary${i}" value="${photoSelector3.files[i].name}" checked>
                <input type="hidden" value="${photoSelector3.files[i].name}" name="imgname[]">
                <label class="form-check-label" style="color: white;" for="imgPrimary${i}">Set as primary</label>
            </div>
                
            </div>
            
        </div>`
        // URL.revokeObjectURL(objectURL);
    }
    imgRow3.innerHTML = row;   
});

//===========================================================================================================================================

const   photoSelector4 =     document.getElementById('photoSelector4');

photoSelector4.addEventListener('change',function () {
    let row = imgRow4.innerHTML;
    row = '';

    if(this.files.length > 10){
        imgRow4.innerHTML = '<h6 style="color: red;">Please select 10 files only !</h6>';
        return;
    };
    for (var i = 0; i < photoSelector4.files.length; ++i){
        let name = photoSelector4.files.item(i).name;
        const ImageUrl = window.URL.createObjectURL(photoSelector4.files[i]);
        row = row + 
        `<div class = "col uploaderImg" style = "margin: 0.5rem ;padding: 0.4rem; background-color: gray; width:100%">
            <div>
            <img src="${ImageUrl}" class="rounded mx-auto d-block img-fluid galleryImg" alt="Responsive image" ;"="" style="background-color: rgb(65, 70, 61);height: 10rem;object-fit: scale-down;">
            </div>
            <div style = "margin-top: 0.5rem;">
            
            <div class="form-check">
                <input class="form-check-input" type="radio" name="imgPrimary" id="imgPrimary${i}" value="${photoSelector4.files[i].name}" checked>
                <input type="hidden" value="${photoSelector4.files[i].name}" name="imgname[]">
                <label class="form-check-label" style="color: white;" for="imgPrimary${i}">Set as primary</label>
            </div>
                
            </div>
            
        </div>`
        // URL.revokeObjectURL(objectURL);
    }
    imgRow4.innerHTML = row;   
});
