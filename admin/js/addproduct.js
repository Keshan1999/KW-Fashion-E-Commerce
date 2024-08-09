document.addEventListener("DOMContentLoaded", function() {
    // Initialize Quill Editor
    const quill = new Quill(".js-quill", {
      modules: {
        toolbar: [
          [
            "bold",
            "italic",
            "underline",
            "strike",
            "link",
            "image",
            "blockquote",
            "code",
            { list: "bullet" },
          ],
        ],
      },
      placeholder: "Type your description...",
    });
  
    // Initialize Dropzone
    const dropzone = new Dropzone("#attachFilesNewProjectLabel", {
      url: "/upload", // Replace with your actual upload endpoint
      autoProcessQueue: false, // Prevent automatic upload
      addRemoveLinks: true, // Add remove links to uploaded files
      init: function () {
        this.on("addedfile", (file) => {
          // Handle file added event
          console.log("File added:", file);
        });
  
        this.on("removedfile", (file) => {
          // Handle file removed event
          console.log("File removed:", file);
        });
      },
    });
  
    // Initialize Tom Select for Select Elements
    const selectElements = document.querySelectorAll(
      ".js-select, .js-select-dynamic"
    );
    selectElements.forEach((selectElement) => {
      new TomSelect(selectElement, {
        searchInDropdown: false,
        hideSearch: true,
        dropdownWidth:
          selectElement.dataset.hsTomSelectOptions.dropdownWidth || "auto",
        dropdownWrapperClass:
          selectElement.dataset.hsTomSelectOptions.dropdownWrapperClass || "",
      });
    });
  
    // Initialize Add Another Field Plugin
    const addAnotherField = new HSAddField(".js-add-field", {
      template: "#addAnotherOptionFieldTemplate",
      container: "#addAnotherOptionFieldContainer",
      defaultCreated: 0,
    });
  
    // Initialize Tooltips
    const tooltipTriggerList = document.querySelectorAll(
      '[data-bs-toggle="tooltip"]'
    );
    const tooltipList = [...tooltipTriggerList].map(
      (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
    );
  
    // Initialize Modals
    const addImageFromURLModal = document.getElementById("addImageFromURLModal");
    const embedVideoModal = document.getElementById("embedVideoModal");
    const productsAdvancedFeaturesModal = document.getElementById(
      "productsAdvancedFeaturesModal"
    );
  
    if (addImageFromURLModal) {
      new bootstrap.Modal(addImageFromURLModal);
    }
  
    if (embedVideoModal) {
      new bootstrap.Modal(embedVideoModal);
    }
  
    if (productsAdvancedFeaturesModal) {
      new bootstrap.Modal(productsAdvancedFeaturesModal);
    }
  
    // Handle Form Submission
    const form = document.querySelector("form"); // Assuming your form has a form tag
  
    if (form) {
      form.addEventListener("submit", (event) => {
        event.preventDefault(); // Prevent default form submission
  
        // Gather form data
        const formData = new FormData(form);
  
        // Validate name and price fields
        const name = formData.get('proname');
        const price = formData.get('proprice');
        
        // Regular expression to allow only letters and spaces
        const nameRegex = /^[a-zA-Z\s]+$/;
        // Regular expression to allow only numbers
        const priceRegex = /^[0-9]+(\.[0-9]+)?$/;
  
        if (!name.trim() || !nameRegex.test(name)) {
          alert('Name field is required and should contain only letters.');
          return;
        }
        if (!price || !priceRegex.test(price)) {
          alert('Price field should contain only numbers.');
          return;
        }
  
        // Send form data to server using Fetch API
        fetch("addproduct.php", {
          method: "POST",
          body: formData,
        })
          .then((response) => {
            if (!response.ok) {
              throw new Error("Network response was not ok");
            }
            return response.text();
          })
          .then((data) => {
            // Handle success response
            console.log(data);
            // Redirect to another page if needed
            window.location.href = 'adminproduct.html';
          })
          .catch((error) => {
            // Handle error
            console.error("There was a problem with the fetch operation:", error);
          });
      });
    }
  });
  
  