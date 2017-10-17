# Build Images Locally

```
docker-compose -f build.yaml build
```

# Deploy

```
kubectl apply -f deployment-app.yaml --validate=false
```

# Create Service

```
kubectl expose deployment app-deployment --type=NodePort --name=app-service

kubectl describe services app-service
```

Visit http://192.168.99.100:31000

# Clean Up

```
kubectl delete services app-service

kubectl delete deployment app-deployment
```

# Admin

http://192.168.99.100:30000