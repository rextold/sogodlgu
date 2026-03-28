<style>
/* Minimal Transparent Share Buttons with Icons */
.share-wrapper {
    margin-top: 10px;
    font-family: 'Roboto', sans-serif;
}

.share-label {
    font-weight: 600;
    color: #ea5211; /* logo orange */
    margin-right: 6px;
    font-size: clamp(11px, 1vw, 13px);
}

.share-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}

.share-buttons a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    padding: 4px 8px;
    border-radius: 20px;
    background: transparent;
    color: #555;
    font-size: clamp(11px, 1vw, 13px);
    text-decoration: none;
    transition: color 0.3s ease, transform 0.2s ease;
    white-space: nowrap;
}

.share-buttons a i {
    font-size: clamp(24px, 1vw, 15px);
    padding: 3px;
    border-radius: 50%;
    background-color: transparent;
    transition: color 0.3s ease, transform 0.2s ease;
}

.share-buttons a:hover {
    color: #ea5211;
    transform: translateY(-1px);
}

.share-buttons a:hover i {
    color: #ea5211;
}

/* Platform colors for icons only */
.share-facebook i { color: #3b5998; }
.share-twitter i { color: #1da1f2; }
.share-linkedin i { color: #0077b5; }
.share-whatsapp i { color: #25d366; }
.share-copy i { color: #555; }

/* Responsive layout */
@media (max-width: 576px) {
    .share-wrapper {
        text-align: center;
    }
    .share-buttons {
        justify-content: center;
    }
}
</style>

<div class="share-wrapper mb-4">
    <span class="share-label">Share:</span>
    <div class="share-buttons">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->full() }}" target="_blank" class="share-facebook">
            <i class="fa fa-facebook"></i>
        </a>
        <a href="https://twitter.com/intent/tweet?url={{ url()->full() }}" target="_blank" class="share-twitter">
            <i class="fa fa-twitter"></i>
        </a>
        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->full() }}" target="_blank" class="share-linkedin">
            <i class="fa fa-linkedin"></i>
        </a>
        <a href="https://api.whatsapp.com/send?text={{ url()->full() }}" target="_blank" class="share-whatsapp">
            <i class="fa fa-whatsapp"></i>
        </a>
        <a href="#" class="share-copy" onclick="navigator.clipboard.writeText('{{ url()->full() }}'); alert('Link copied!')">
            <i class="fa fa-link"></i>
        </a>
    </div>
</div>