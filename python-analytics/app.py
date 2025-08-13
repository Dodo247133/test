
from flask import Flask, request, jsonify
import os

app = Flask(__name__)

# Very simple, rule-based "recommendation"
COURSE_CATALOG = [
    {"id": "DS101", "name": "Python for Data Science"},
    {"id": "WD110", "name": "Web Dev Starter"},
    {"id": "AZ201", "name": "Azure Cloud Basics"},
    {"id": "ML310", "name": "Intro to Machine Learning"},
]

@app.get("/")
def home():
    return {"service": "analytics", "status": "ok"}

@app.post("/recommend")
def recommend():
    data = request.get_json(silent=True) or {}
    interests = set((data.get("interests") or []))
    recs = []
    if "data" in interests or "ai" in interests:
        recs.append(COURSE_CATALOG[0])
        recs.append(COURSE_CATALOG[3])
    if "web" in interests:
        recs.append(COURSE_CATALOG[1])
    if "cloud" in interests:
        recs.append(COURSE_CATALOG[2])
    # Fallback if nothing matched
    if not recs:
        recs = COURSE_CATALOG[:2]
    return jsonify({"recommendations": recs})

if __name__ == "__main__":
    port = int(os.environ.get("PORT", 8000))
    app.run(host="0.0.0.0", port=port)
