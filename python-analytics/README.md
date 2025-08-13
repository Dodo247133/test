
Flask analytics service for Azure App Service (Linux, Python 3.10/3.11).
Endpoints:
  GET /           -> health/status
  POST /recommend -> JSON body {"interests": ["data","ai","web","cloud"]}
Run locally:
  pip install -r requirements.txt
  gunicorn --bind 0.0.0.0:8000 app:app
