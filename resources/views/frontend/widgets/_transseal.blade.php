<style>
/* === Transparency Seal Card === */
.trans-seal {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 16px 12px;
  background: #fff9f2; /* soft warm background */
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  max-width: 220px;
  margin: auto;
}

.trans-seal:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.trans-seal h4 {
  font-size: 1rem;
  font-weight: 700;
  color: #ea5211; /* logo orange */
  margin-bottom: 6px;
}

.trans-seal h4 small {
  display: block;
  font-weight: 400;
  font-size: 0.75rem;
  color: #555;
}

.trans-seal a img {
  width: 100%;
  max-width: 120px;
  border-radius: 8px;
  margin-top: 8px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.trans-seal a img:hover {
  transform: scale(1.05);
  box-shadow: 0 6px 18px rgba(0,0,0,0.12);
}

/* Responsive */
@media (max-width: 576px) {
  .trans-seal {
    max-width: 160px;
    padding: 12px;
  }
  .trans-seal a img {
    max-width: 100px;
  }
  .trans-seal h4 {
    font-size: 0.9rem;
  }
  .trans-seal h4 small {
    font-size: 0.7rem;
  }
}
</style>

<div class="trans-seal">
  <h4>Transparency<small>Seal</small></h4>
  <a href="#">
    <img src="{{ asset('images/transseal/transseal.png') }}" alt="Transparency Seal" title="Transparency Seal" class="transparency-seal" />
  </a>
</div>
