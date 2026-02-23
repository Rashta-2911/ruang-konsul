<style>

/* ================= FLOAT BUTTON ================= */
.chat-toggle {
    position: fixed;
    bottom: 25px;
    right: 25px;
    background: linear-gradient(135deg, #223a66, #2b4c7e);
    color: white;
    border: none;
    border-radius: 50%;
    width: 65px;
    height: 65px;
    font-size: 26px;
    cursor: pointer;
    box-shadow: 0 10px 30px rgba(34,58,102,0.35);
    transition: 0.3s;
}
.chat-toggle:hover {
    transform: scale(1.08);
}

/* ================= CHAT BOX ================= */
.chat-box {
    position: fixed;
    bottom: 105px;
    right: 25px;
    width: 340px;
    height: 480px;
    background: #ffffff;
    border-radius: 18px;
    box-shadow: 0 20px 45px rgba(0,0,0,0.15);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    font-size: 14px;
}

/* ================= HEADER ================= */
.chat-header {
    background: linear-gradient(135deg, #223a66, #2b4c7e);
    color: white;
    padding: 15px;
    font-weight: 600;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* ================= MESSAGE AREA ================= */
.chat-messages {
    flex: 1;
    padding: 16px;
    overflow-y: auto;
    background: #f5f8fd;
}

/* ================= MESSAGE ================= */
.message {
    margin-bottom: 12px;
    display: flex;
}
.message.user {
    justify-content: flex-end;
}

.bubble {
    max-width: 75%;
    padding: 11px 15px;
    border-radius: 14px;
    line-height: 1.45;
}

.button{
    justify-content: right;
}

/* USER */
.user .bubble {
    background: #e12454;
    color: white;
    border-bottom-right-radius: 4px;
}

/* BOT */
.bot .bubble {
    background: white;
    border: 1px solid #e1e7f0;
    border-bottom-left-radius: 4px;
}

/* avatar dokter */
.message.bot::before {
    content: "🩺";
    margin-right: 8px;
    font-size: 18px;
}

/* ================= INPUT ================= */
.chat-input {
    display: flex;
    border-top: 1px solid #eee;
    background: white;
}
.chat-input input {
    flex: 1;
    border: none;
    padding: 13px;
    outline: none;
}
.chat-input button {
    background: #223a66;
    color: white;
    border: none;
    padding: 0 18px;
    font-weight: 500;
}
.chat-input button:hover {
    background: #1a2e52;
}

.d-none {
    display: none;
}

</style>
</head>

<body id="top">



<!-- ================= CHAT BUTTON ================= -->
<button id="chatToggle" class="chat-toggle">
    <i class="icofont-live-support"></i>
</button>

<!-- ================= CHAT BOX ================= -->
<div id="chatBox" class="chat-box d-none">

    <div class="chat-header">
        Konsultasi Online
        <span id="closeChat" style="cursor:pointer;">✖</span>
    </div>

    <div id="chatbotMessages" class="chat-messages"></div>

    <div style="padding: 5px 15px; background: #fffbe6; font-size: 11px; color: #856404; border-top: 1px solid #ffe58f;">
        <i class="icofont-info-circle"></i> Chatbot ini hanya melayani pertanyaan seputar kesehatan & layanan RuangKonsul.
    </div>

    <div class="chat-input">
        <input type="text" id="chatInput" placeholder="Tulis pesan..." />
        <button id="sendMessage">Kirim</button>
    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const chatToggle   = document.getElementById("chatToggle");
    const chatBox      = document.getElementById("chatBox");
    const closeChat    = document.getElementById("closeChat");
    const sendBtn      = document.getElementById("sendMessage");
    const chatInput    = document.getElementById("chatInput");
    const chatbotMessages = document.getElementById("chatbotMessages");

    chatToggle.addEventListener("click", () => chatBox.classList.toggle("d-none"));
    closeChat.addEventListener("click", () => chatBox.classList.add("d-none"));

    sendBtn.addEventListener("click", sendMessage);
    chatInput.addEventListener("keypress", e => {
        if(e.key === "Enter") sendMessage();
    });

    /* welcome message */
    appendMessage("Bot","Halo 👋 Selamat datang di <b>RuangKonsul</b>. Saya asisten AI yang siap membantu menjawab pertanyaan Anda seputar <b>kesehatan</b> dan layanan kami. Apa yang bisa saya bantu hari ini?");

    function sendMessage() {
        let message = chatInput.value.trim();
        if (!message) return;

        appendMessage("Anda", message);
        chatInput.value = "";

        fetch("/chatbot/send", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ message: message })
        })
        .then(res => {
            if (!res.ok) {
                console.error("HTTP Error:", res.status, res.statusText);
                return res.json().then(data => {
                    throw new Error(`HTTP ${res.status}: ${data.reply || res.statusText}`);
                }).catch(parseErr => {
                    throw new Error(`HTTP ${res.status}`);
                });
            }
            return res.json();
        })
        .then(data => {
            if (data.reply) {
                appendMessage("Bot", data.reply);
            } else {
                console.error("No reply in response:", data);
                appendMessage("Bot","Maaf, tidak ada balasan dari server.");
            }
        })
        .catch(err => {
            console.error("Chatbot Error:", err.message || err);
            appendMessage("Bot", err.message || "Terjadi kesalahan koneksi. Silakan periksa koneksi internet atau coba lagi nanti.");
        });
    }

    function appendMessage(sender, text) {

        const wrapper = document.createElement("div");

        if (sender === "Anda") {
            wrapper.className = "message user";
        } else {
            wrapper.className = "message bot";
        }

        const bubble = document.createElement("div");
        bubble.className = "bubble";
        bubble.innerHTML = text;

        wrapper.appendChild(bubble);
        chatbotMessages.appendChild(wrapper);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;

    }

});

</script>

<script>
document.addEventListener("DOMContentLoaded", function(){

  document.querySelectorAll('.add-to-cart-btn').forEach(btn => {

    btn.addEventListener('click', function (e) {

      e.preventDefault();

      // Anti double click
      if(this.disabled) return;

      const produkId = this.dataset.id;
      const url = "{{ route('cart.add') }}";
      const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      const button = this;

      button.disabled = true;

      fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({
          produk_id: produkId,
          qty: 1
        })
      })
      .then(res => res.json())
      .then(data => {

        if(data.success){

          button.innerHTML = "✔ Added";
          button.style.background = "#16a34a";
          button.style.borderColor = "#16a34a";
          button.style.color = "white";

          const countEl = document.getElementById('cart-count');
          if(countEl){
            countEl.textContent = data.cart_count;
          }

        } else {
          alert(data.message);
          button.disabled = false;
        }

      })
      .catch(error => {
        console.error(error);
        alert("Terjadi kesalahan.");
        button.disabled = false;
      });

    });

  });

});
</script>