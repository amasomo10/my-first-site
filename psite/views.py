from django.shortcuts import redirect
from django.http import HttpResponseRedirect
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

def contact(request):
    return render(request, 'psite/contact.html', {})

def contact(request):
    if request.is_ajax() and request.method == 'GET':
        return render(request, 'psite/contact.php', {})
    else:
        return render(request, 'psite/contact.html', {})
