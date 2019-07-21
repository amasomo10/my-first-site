from django.shortcuts import render

# Create your views here.
def home(request):
    return render(request, 'psite/home.html', {})

def about(request):
    return render(request, 'psite/about.html', {})

def projects(request):
    return render(request, 'psite/projects.html', {})

def calculation(request):
    return render(request, 'psite/calculation.html', {})
