<template>
    <div>
      <div class="dial-pad">
        <input v-model="phoneNumber" placeholder="Enter phone number" />
        <div class="dial-buttons">
          <button
            v-for="digit in digits"
            @click="appendToPhoneNumber(digit)"
            :key="digit"
          >
            {{ digit }}
          </button>
        </div>
        <button @click="call">Call</button>
      </div>
      <div class="popup" v-if="showPopup">
        <p>{{ popupMessage }}</p>
        <button @click="closePopup">OK</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        phoneNumber: "",
        digits: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "*", "0", "#"],
        showPopup: false,
        popupMessage: "",
      };
    },
    methods: {
      appendToPhoneNumber(digit) {
        this.phoneNumber += digit;
      },
      call() {
        axios
          .post("/api/dial", { phoneNumber: this.phoneNumber })
          .then((response) => {
            this.popupMessage = response.data.message;
            this.showPopup = true;
          })
          .catch((error) => {
            console.error(error);
          });
      },
      closePopup() {
        this.showPopup = false;
        this.phoneNumber = "";
      },
    },
  };
  </script>
  
  <style scoped>
  .dial-pad {
    text-align: center;
    margin: 20px;
  }
  
  input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
  }
  
  .dial-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
  }
  
  button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
  }
  
  .popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .popup p {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
  }
  
  .popup button {
    margin-top: 10px;
    padding: 10px 20px;
    cursor: pointer;
  }
  </style>
  