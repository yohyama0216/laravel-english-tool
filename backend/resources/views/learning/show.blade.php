@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Learning</h1>

    <div id="learning-app">
        <div v-if="message" :class="messageClass">@{{ message }}</div>
        <div class="card">
            <div class="card-body">
                <p><strong>Sentence:</strong> @{{ sentence }}</p>
                <form @submit.prevent="handleSubmit">
                    <div class="form-group">
                        <label for="user_input">Type the sentence exactly:</label>
                        <input
                            type="text"
                            v-model="userInput"
                            class="form-control"
                            required
                        />
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@3.2.37/dist/vue.global.min.js"></script>
<script>
    const app = Vue.createApp({
        data() {
            return {
                sentence: @json($sentence->sentence),
                sentenceId: @json($sentence->id),
                userInput: '',
                message: '',
                messageClass: ''
            };
        },
        methods: {
            async handleSubmit() {
                try {
                    const postdata = {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            sentence_id: this.sentenceId,
                            user_input: this.userInput
                        })
                    };
                    const response = await fetch('/grading/check', postdata);
                    console.log(postdata)
                    const data = await response.json();
                    this.message = data.message;
                    this.messageClass = data.success
                        ? 'alert alert-success'
                        : 'alert alert-danger';
                } catch (error) {
                    console.log(error)
                    console.error("There was an error!", error);
                    this.message = "An error occurred, please try again.";
                    this.messageClass = 'alert alert-danger';
                }
            }
        }
    });

    app.mount('#learning-app');
</script>
@endsection
