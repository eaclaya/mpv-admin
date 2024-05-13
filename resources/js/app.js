import "./bootstrap";

import "./../../vendor/power-components/livewire-powergrid/dist/powergrid";

// If you use Tailwind
import "./../../vendor/power-components/livewire-powergrid/dist/tailwind.css";

import flatpickr from "flatpickr";
import Swal from "sweetalert2";

document.addEventListener("DOMContentLoaded", function () {
  Livewire.on("showDeleteConfirmation", (params) => {
    console.log(params);
    Swal.fire({
      title: "Are you sure?",
      text: "You will not be able to undo this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        console.log("before dispatch");
        Livewire.dispatch("delete", params);
      }
    });
  });
});
