@extends('layouts.app')

@section('title', 'Chat Dokter | RuangKonsul')

@section('meta_description', 'RuangKonsul - Konsultasi kesehatan online profesional')

@section('content')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dokter.css') }}">
<style>
    :root {
        --primary-color: #1f3a70;
        --secondary-color: #E91E5F;
        --light-bg: #f8f9fa;
        --border-color: #e0e6f2;
        --text-muted: #6c757d;
        --success-color: #28a745;
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #f8f9fa 100%);
    }

    /* HEADER */
    .doctor-header {
        background: white;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 2px 8px rgba(31, 58, 112, 0.08);
        border-left: 4px solid var(--secondary-color);
    }

    .doctor-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .doctor-avatar-container {
        position: relative;
    }

    .doctor-avatar {
        width: 90px;
        height: 90px;
        border-radius: 12px;
        object-fit: cover;
        border: 3px solid var(--secondary-color);
        box-shadow: 0 4px 12px rgba(233, 30, 95, 0.15);
    }

    .doctor-status-badge {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: var(--success-color);
        border: 3px solid white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        color: white;
        box-shadow: 0 2px 6px rgba(40, 167, 69, 0.3);
    }

    .doctor-info h4 {
        color: var(--primary-color);
        font-weight: 700;
        margin-bottom: 8px;
        font-size: 22px;
    }

    .doctor-specialty {
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 8px;
        text-transform: capitalize;
    }

    .doctor-status-text {
        font-size: 13px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .doctor-price-card {
        background: linear-gradient(135deg, var(--primary-color), #2d4a8c);
        color: white;
        padding: 20px 25px;
        border-radius: 10px;
        text-align: center;
        min-width: 180px;
    }

    .doctor-price-label {
        font-size: 12px;
        opacity: 0.9;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .doctor-price-value {
        font-size: 24px;
        font-weight: 700;
        color: #fff;
    }

    /* CHAT STATUS BADGE */
    .chat-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-top: 6px;
    }

    /* CHAT CONTAINER */
    .chat-wrapper {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(31, 58, 112, 0.1);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 650px;
        border: 1px solid var(--border-color);
    }

    .chat-header-top {
        background: linear-gradient(135deg, var(--primary-color), #2d4a8c);
        padding: 20px 25px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .chat-header-title {
        font-size: 16px;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
        color: white;
    }

    .chat-header-status {
        font-size: 12px;
        opacity: 0.85;
        margin-top: 4px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .chat-status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
    }

    .chat-status-indicator {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #28d234;
        box-shadow: 0 0 8px rgba(40, 210, 52, 0.6);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.6; }
    }

    /* MESSAGES AREA */
    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 30px 25px;
        background: #fff;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .chat-messages::-webkit-scrollbar { width: 6px; }
    .chat-messages::-webkit-scrollbar-track { background: transparent; }
    .chat-messages::-webkit-scrollbar-thumb { background: #ccc; border-radius: 3px; }
    .chat-messages::-webkit-scrollbar-thumb:hover { background: #999; }

    .message-welcome {
        text-align: center;
        color: var(--text-muted);
        padding: 40px 20px;
        margin: auto;
    }

    .message-welcome-icon {
        font-size: 48px;
        margin-bottom: 15px;
        display: block;
    }

    .message-welcome p {
        font-size: 15px;
        margin: 10px 0;
        font-weight: 500;
    }

    .message-welcome small {
        display: block;
        font-size: 13px;
        color: #999;
        margin-top: 15px;
    }

    /* CHAT LOCKED */
    .chat-locked {
        text-align: center;
        color: var(--text-muted);
        padding: 40px 20px;
        margin: auto;
    }

    .chat-locked-icon {
        font-size: 48px;
        margin-bottom: 15px;
        display: block;
    }

    /* MESSAGE ROW */
    .message-row {
        display: flex;
        gap: 12px;
        animation: slideIn 0.3s ease;
    }

    .message-row.sent { justify-content: flex-end; }

    @keyframes slideIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .message-content {
        display: flex;
        flex-direction: column;
        gap: 4px;
        max-width: 65%;
    }

    .message-bubble {
        padding: 12px 18px;
        border-radius: 18px;
        word-wrap: break-word;
        line-height: 1.5;
        font-size: 14px;
    }

    .message-row.received .message-bubble {
        background: var(--light-bg);
        color: var(--primary-color);
        border: 1px solid var(--border-color);
        box-shadow: 0 1px 3px rgba(31, 58, 112, 0.08);
        border-radius: 4px 18px 18px 18px;
    }

    .message-row.sent .message-bubble {
        background: linear-gradient(135deg, var(--secondary-color), #d41a4f);
        color: white;
        box-shadow: 0 3px 10px rgba(233, 30, 95, 0.2);
        border-radius: 18px 4px 18px 18px;
    }

    .message-time {
        font-size: 11px;
        color: var(--text-muted);
    }

    .message-row.sent .message-time { text-align: right; }

    .message-sender {
        font-size: 11px;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 2px;
    }

    /* INPUT FOOTER */
    .chat-footer {
        padding: 18px 25px;
        border-top: 1px solid var(--border-color);
        background: #fff;
        flex-shrink: 0;
    }

    .chat-input-group {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .chat-input-group input {
        flex: 1;
        border: 1.5px solid var(--border-color);
        border-radius: 24px;
        padding: 12px 20px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: #f8f9fa;
        color: var(--primary-color);
        outline: none;
    }

    .chat-input-group input:focus {
        border-color: var(--secondary-color);
        background: white;
        box-shadow: 0 0 0 3px rgba(233, 30, 95, 0.1);
    }

    .chat-input-group input::placeholder { color: #aaa; }

    .chat-input-group input:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .chat-input-group button {
        padding: 12px 24px;
        border-radius: 24px;
        border: none;
        background: linear-gradient(135deg, var(--secondary-color), #d41a4f);
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 2px 8px rgba(233, 30, 95, 0.2);
        white-space: nowrap;
    }

    .chat-input-group button:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(233, 30, 95, 0.3);
    }

    .chat-input-group button:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    /* LOADING */
    .loading-spinner {
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin { to { transform: rotate(360deg); } }

    .error-message {
        background: #fee;
        color: #c33;
        padding: 10px 14px;
        border-radius: 8px;
        font-size: 13px;
        margin-top: 10px;
        border-left: 3px solid #c33;
    }

    /* BACK LINK */
    .back-link-container {
        margin-top: 30px;
        padding-bottom: 20px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--secondary-color);
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        padding: 8px 12px;
        border-radius: 6px;
    }

    .back-link:hover {
        background: rgba(233, 30, 95, 0.08);
        transform: translateX(-4px);
        color: var(--secondary-color);
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .doctor-card-header { flex-direction: column; text-align: center; }
        .doctor-price-card { min-width: auto; width: 100%; }
        .chat-wrapper { height: 500px; }
        .message-content { max-width: 85%; }
        .doctor-avatar { width: 80px; height: 80px; }
        .doctor-info h4 { font-size: 18px; }
    }
</style>
@endpush

<section class="section py-5">
    <div class="container">

        <!-- HEADER DOKTER -->
        <div class="doctor-header">
            <div class="doctor-card-header">
                <div class="d-flex align-items-start gap-4" style="flex: 1;">

                    <div class="doctor-avatar-container">
                        <img src="{{ asset($dokter->gambar) }}"
                             class="doctor-avatar"
                             alt="{{ $dokter->dokterName }}">
                        <div class="doctor-status-badge">✓</div>
                    </div>

                    <div class="doctor-info">
                        <h4>Dr. {{ $dokter->dokterName }}</h4>
                        <div class="doctor-specialty">{{ ucwords($dokter->namaBidang) }}</div>

                        @php
                            $statusDokter = strtolower($dokter->statusDokter ?? 'offline');
                            $statusDokterConfig = [
                                'online'   => ['color' => '#28a745', 'label' => 'Online'],
                                'offline'  => ['color' => '#6c757d', 'label' => 'Offline'],
                                'sibuk'    => ['color' => '#dc3545', 'label' => 'Sibuk'],
                                'tersedia' => ['color' => '#007bff', 'label' => 'Tersedia'],
                            ];
                            $dokterStatus = $statusDokterConfig[$statusDokter] ?? $statusDokterConfig['offline'];
                        @endphp

                        <div class="doctor-status-text" style="color: {{ $dokterStatus['color'] }};">
                            <span style="width: 8px; height: 8px; background: {{ $dokterStatus['color'] }}; border-radius: 50%; display: inline-block;"></span>
                            {{ $dokterStatus['label'] }}
                        </div>

                        @if($chat)
                            @php
                                $chatStatus = strtolower($chat->status);
                                $chatStatusConfig = [
                                    'online'   => ['bg' => '#d4edda', 'text' => '#155724', 'label' => 'Chat Aktif'],
                                    'offline'  => ['bg' => '#e2e3e5', 'text' => '#383d41', 'label' => 'Chat Offline'],
                                    'sibuk'    => ['bg' => '#f8d7da', 'text' => '#721c24', 'label' => 'Dokter Sibuk'],
                                    'tersedia' => ['bg' => '#cce5ff', 'text' => '#004085', 'label' => 'Dokter Tersedia'],
                                ];
                                $chatBadge = $chatStatusConfig[$chatStatus] ?? ['bg' => '#e2e3e5', 'text' => '#383d41', 'label' => ucfirst($chat->status)];
                            @endphp
                            <span class="chat-status-badge"
                                  style="background-color: {{ $chatBadge['bg'] }}; color: {{ $chatBadge['text'] }};">
                                <span style="width: 6px; height: 6px; border-radius: 50%; background: {{ $chatBadge['text'] }}; display: inline-block;"></span>
                                {{ $chatBadge['label'] }}
                            </span>
                        @endif
                    </div>
                </div>

                <!-- BIAYA KONSULTASI -->
                <div class="doctor-price-card">
                    <div class="doctor-price-label">Biaya Konsultasi</div>
                    <div class="doctor-price-value">
                        Rp {{ number_format($dokter->hargaKonsultasi, 0, ',', '.') }}
                    </div>
                </div>
            </div>
        </div>

        <!-- CHAT CONTAINER -->
        <div class="chat-wrapper">

            <!-- Chat Header -->
            <div class="chat-header-top">
                <div>
                    <h5 class="chat-header-title">
                        <span class="chat-status-indicator"></span>
                        Chat dengan Dr. {{ $dokter->dokterName }}
                    </h5>
                    @if($chat)
                        <div class="chat-header-status">
                            <span class="chat-status-dot" style="background: #28d234;"></span>
                            ID Chat: {{ $chat->chatDokterId }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- MESSAGES -->
            <div class="chat-messages" id="chatMessages">
                @if($chat)
                    <div class="message-welcome" id="welcomeMsg">
                        <span class="message-welcome-icon">💬</span>
                        <p><strong>Mulai percakapan dengan dokter</strong></p>
                        <small>Kirim pesan pertama Anda untuk memulai konsultasi</small>
                    </div>
                @else
                    <div class="chat-locked">
                        <span class="chat-locked-icon">🔒</span>
                        <p><strong>Sesi chat belum dibuat</strong></p>
                        <small>Silakan kembali dan klik tombol "Chat Dokter" untuk memulai</small>
                    </div>
                @endif
            </div>

            <!-- INPUT -->
            <div class="chat-footer">
                <div class="chat-input-group">
                    <input type="text"
                           id="messageInput"
                           placeholder="{{ $chat ? 'Ketik pesan Anda...' : 'Buat sesi chat terlebih dahulu' }}"
                           autocomplete="off"
                           {{ !$chat ? 'disabled' : '' }}>
                    <button id="sendBtn" {{ !$chat ? 'disabled' : '' }}>
                        <i class="icofont-send-mail"></i> Kirim
                    </button>
                </div>
                <div id="errorMessage" class="error-message" style="display: none;"></div>
            </div>

        </div>

        <!-- KEMBALI -->
        <div class="back-link-container">
            <a href="{{ url()->previous() }}" class="back-link">
                ← Kembali ke daftar dokter
            </a>
        </div>

    </div>
</section>

<script>
    const chatMessages   = document.getElementById('chatMessages');
    const messageInput   = document.getElementById('messageInput');
    const sendBtn        = document.getElementById('sendBtn');
    const errorMessage   = document.getElementById('errorMessage');

    @if($chat)
        const chatDokterId = '{{ $chat->chatDokterId }}';
        const sendUrl      = '{{ url("landing/dokter/message") }}/' + chatDokterId + '/send';
        const getUrl       = '{{ url("landing/dokter/message") }}/' + chatDokterId + '/get';
        const csrfToken    = '{{ csrf_token() }}';
    @endif

    let welcomeRemoved = false;
    let isLoading      = false;
    let lastMessageId  = 0;

    function removeWelcome() {
        if (!welcomeRemoved) {
            const welcome = document.getElementById('welcomeMsg');
            if (welcome) welcome.remove();
            welcomeRemoved = true;
        }
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function displayMessage(msg, senderType) {
        removeWelcome();

        const isSent = senderType === 'customer';
        const row    = document.createElement('div');
        row.className = `message-row ${isSent ? 'sent' : 'received'}`;
        row.dataset.id = msg.id || '';

        row.innerHTML = `
            <div class="message-content">
                ${!isSent ? `<div class="message-sender">Dr. {{ $dokter->dokterName }}</div>` : ''}
                <div class="message-bubble">${escapeHtml(msg.message || msg)}</div>
                <div class="message-time">${msg.created_at || ''}</div>
            </div>
        `;

        chatMessages.appendChild(row);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        if (msg.id && msg.id > lastMessageId) {
            lastMessageId = msg.id;
        }
    }

    function showError(text) {
        errorMessage.textContent = text;
        errorMessage.style.display = 'block';
        setTimeout(() => { errorMessage.style.display = 'none'; }, 4000);
    }

    // Load history
    function loadChatHistory() {
        @if($chat)
        fetch(getUrl, {
            headers: { 'X-CSRF-TOKEN': csrfToken }
        })
        .then(res => res.json())
        .then(messages => {
            if (messages.length > 0) {
                // Hanya render pesan baru
                const newMessages = messages.filter(m => m.id > lastMessageId);
                if (newMessages.length > 0) {
                    removeWelcome();
                    newMessages.forEach(msg => displayMessage(msg, msg.sender_type));
                }
            }
        })
        .catch(err => console.error('Error loading messages:', err));
        @endif
    }

    // Send message
    @if($chat)
    function sendMessage() {
        const message = messageInput.value.trim();
        if (!message || isLoading) return;

        isLoading          = true;
        sendBtn.disabled   = true;
        sendBtn.innerHTML  = '<span class="loading-spinner"></span>';
        errorMessage.style.display = 'none';

        fetch(sendUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ message })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                displayMessage(data.message, 'customer');
                messageInput.value = '';
                messageInput.focus();
            } else {
                showError(data.error || 'Gagal mengirim pesan');
            }
        })
        .catch(() => showError('Gagal mengirim pesan. Periksa koneksi Anda.'))
        .finally(() => {
            isLoading         = false;
            sendBtn.disabled  = false;
            sendBtn.innerHTML = '<i class="icofont-send-mail"></i> Kirim';
        });
    }

    sendBtn.addEventListener('click', sendMessage);

    messageInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });
    @endif

    // Init
    document.addEventListener('DOMContentLoaded', function() {
        loadChatHistory();
        @if($chat)
            messageInput.focus();
        @endif
    });

    // Auto reload setiap 5 detik
    @if($chat)
        setInterval(loadChatHistory, 5000);
    @endif
</script>

@endsection