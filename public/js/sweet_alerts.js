function alertMessage(){
        swal({
              title: "Success",
              text: "Your photo has been uploaded successfully!",
              type: "success",
              imageUrl: '/images/check.jpg',
              imageClass: 'successAlert',
              imageAlt: 'Custom image',
              animation: true
        },
             function(){
                //event to perform on click of ok button of sweetalert
        });
};

function alertMessageBig(){
        swal({
              title: "Warning",
              text: "ERROR: File name already exists.",
              type: "warning",
              imageUrl: '/images/warning.jpg',
              imageClass: 'successAlert',
              imageAlt: 'Custom image',
              animation: true
        },
             function(){
                //event to perform on click of ok button of sweetalert
        });
};

function alertMessageError(){
        swal({
              title: "ERROR",
              text: "ERROR: Image size is too large.",
              type: "warning",
              imageUrl: '/images/warning.jpg',
              imageClass: 'successAlert',
              imageAlt: 'Custom image',
              animation: true
        },
             function(){
                //event to perform on click of ok button of sweetalert
        });
};

function alertMessageNoImage(){
        swal({
              title: "Warning",
              text: "You must select an image first.",
              type: "warning",
              imageUrl: '/images/warning.jpg',
              imageClass: 'successAlert',
              imageAlt: 'Custom image',
              animation: true
        },
             function(){
                //event to perform on click of ok button of sweetalert
        });
};

function alertMessageOnlyImage(){
        swal({
              title: "Warning",
              text: "Please upload only Image.",
              type: "warning",
              imageUrl: '/images/warning.jpg',
              imageClass: 'successAlert',
              imageAlt: 'Custom image',
              animation: true
        },
             function(){
                //event to perform on click of ok button of sweetalert
        });
};

function alertMessageProfileInfo(){
        swal({
              title: "Success",
              text: "Profile information has been updated.",
              type: "success",
              imageUrl: '/images/check.jpg',
              imageClass: 'successAlert',
              imageAlt: 'Custom image',
              animation: true
        },
             function(){
                //event to perform on click of ok button of sweetalert
        });
};

function alertFailProfileInfo(){
        swal({
              title: "Fail",
              text: "Profile information not updated.",
              type: "warning",
              imageUrl: '/images/warning.jpg',
              imageClass: 'successAlert',
              imageAlt: 'Custom image',
              animation: true
        },
             function(){
                //event to perform on click of ok button of sweetalert
        });
};

function alertMessageEmptyField(){
        swal({
              title: "Empty",
              text: "Profile information cannot be empty, please fill out all fields.",
              type: "warning",
              imageUrl: '/images/warning.jpg',
              imageClass: 'successAlert',
              imageAlt: 'Custom image',
              animation: true
        },
             function(){
                //event to perform on click of ok button of sweetalert
        });
};

function alertMessageRegistrationSuccess(){
        swal({
              title: "Successfull, Registration has been accepted.",
        //       text: "Registration has been accepted.",
              type: "success",
              imageUrl: '/images/check.jpg',
              imageClass: 'successAlert',
              imageAlt: 'Custom image',
              animation: true
      })
};

function alertMessageNewListSuccess(){

        swal({
          title: 'New list created',
          type: 'success',
          imageUrl: '/images/check.jpg',
          imageClass: 'successAlert',
          imageAlt: 'Custom image',
          animation: true
        });


};

function alertMessageNewListFail(){
        swal({
              title: "Fail",
              text: "Must fill out the fields",
              type: "warning",
              imageUrl: '/images/check.jpg',
              imageClass: 'successAlert',
              imageAlt: 'Custom image',
              animation: true
        },
             function(){
                //event to perform on click of ok button of sweetalert
        });
};

function alertDeleteList(){
        swal({
              title: "Successfull, list has been deleted.",
        //       text: "Registration has been accepted.",
              type: "success",
              imageUrl: '/images/check.jpg',
              imageClass: 'successAlert',
              imageAlt: 'Custom image',
              animation: true
      })
};
