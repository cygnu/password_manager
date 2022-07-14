import React from 'react'
import { useForm } from 'react-hook-form'
import { useSignIn } from '../../queries/AuthQuery'
import { toast, ToastContainer } from 'react-toastify'
import 'react-toastify/dist/ReactToastify.css'

export const Login: React.FC = () => {
  const signIn = useSignIn()

  const { handleSubmit, register } = useForm()

  const onSubmit = handleSubmit(async ({ email, password }) => {
    signIn.mutate({ email: email, password: password })
  })

  return (
    <form onSubmit={onSubmit}>
      <label htmlFor="email">Email</label>
      <input {...register('email')} type="text" />
      <label htmlFor="password">Password</label>
      <input {...register('password')} type="password" />
      <input type="submit" />
      <ToastContainer />
    </form>
  )
}
