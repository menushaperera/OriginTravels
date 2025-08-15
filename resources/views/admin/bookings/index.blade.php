@extends('layouts.admin')

@section('title', 'Bookings Management')

@section('content')
    <div class="min-h-screen" style="background: linear-gradient(135deg, #F3F4F6 0%, #FFFFFF 100%);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold" style="color: #1E3A8A;">Bookings Management</h1>
                        <p class="mt-2 text-sm" style="color: #374151;">Manage and track all customer bookings</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium" style="background-color: #FF6B35; color: #FFFFFF;">
                            Total: {{ $bookings->total() }} bookings
                        </span>
                    </div>
                </div>
            </div>

            <!-- Status Filter Tabs -->
            <div class="mb-6">
                <div class="border-b" style="border-color: #E5E7EB;">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <a href="{{ route('admin.bookings.index') }}" 
                           class="py-2 px-1 border-b-2 font-medium text-sm transition-colors duration-200
                                  {{ !$status ? 'border-current' : 'border-transparent hover:border-gray-300' }}"
                           style="color: {{ !$status ? '#FF6B35' : '#374151' }};">
                            All Bookings
                            <span class="ml-2 py-0.5 px-2 rounded-full text-xs" 
                                  style="background-color: {{ !$status ? '#FEF3C7' : '#F3F4F6' }}; color: {{ !$status ? '#FF6B35' : '#374151' }};">
                                {{ $bookings->total() }}
                            </span>
                        </a>
                        
                        <a href="{{ route('admin.bookings.index', ['status' => 'new']) }}" 
                           class="py-2 px-1 border-b-2 font-medium text-sm transition-colors duration-200
                                  {{ $status === 'new' ? 'border-current' : 'border-transparent hover:border-gray-300' }}"
                           style="color: {{ $status === 'new' ? '#FF6B35' : '#374151' }};">
                            New
                            <span class="ml-2 py-0.5 px-2 rounded-full text-xs" 
                                  style="background-color: {{ $status === 'new' ? '#DBEAFE' : '#F3F4F6' }}; color: {{ $status === 'new' ? '#1E3A8A' : '#374151' }};">
                                {{ $newCount ?? 0 }}
                            </span>
                        </a>
                        
                        <a href="{{ route('admin.bookings.index', ['status' => 'approved']) }}" 
                           class="py-2 px-1 border-b-2 font-medium text-sm transition-colors duration-200
                                  {{ $status === 'approved' ? 'border-current' : 'border-transparent hover:border-gray-300' }}"
                           style="color: {{ $status === 'approved' ? '#FF6B35' : '#374151' }};">
                            Approved
                            <span class="ml-2 py-0.5 px-2 rounded-full text-xs" 
                                  style="background-color: {{ $status === 'approved' ? '#D1FAE5' : '#F3F4F6' }}; color: {{ $status === 'approved' ? '#065F46' : '#374151' }};">
                                {{ $approvedCount ?? 0 }}
                            </span>
                        </a>
                        
                        <a href="{{ route('admin.bookings.index', ['status' => 'rejected']) }}" 
                           class="py-2 px-1 border-b-2 font-medium text-sm transition-colors duration-200
                                  {{ $status === 'rejected' ? 'border-current' : 'border-transparent hover:border-gray-300' }}"
                           style="color: {{ $status === 'rejected' ? '#FF6B35' : '#374151' }};">
                            Rejected
                            <span class="ml-2 py-0.5 px-2 rounded-full text-xs" 
                                  style="background-color: {{ $status === 'rejected' ? '#FEE2E2' : '#F3F4F6' }}; color: {{ $status === 'rejected' ? '#DC2626' : '#374151' }};">
                                {{ $rejectedCount ?? 0 }}
                            </span>
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Table Section -->
            <div class="overflow-hidden shadow-xl rounded-lg" style="background-color: #FFFFFF;">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y" style="divide-color: #E5E7EB;">
                        <thead style="background: linear-gradient(135deg, #1E3A8A 0%, #2563EB 100%);">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider" style="color: #FFFFFF;">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider" style="color: #FFFFFF;">
                                    Package
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider" style="color: #FFFFFF;">
                                    Customer
                                </th>
                                <th scope="col" class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider" style="color: #FFFFFF;">
                                    Total
                                </th>
                                <th scope="col" class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider" style="color: #FFFFFF;">
                                    Payment
                                </th>
                                <th scope="col" class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider" style="color: #FFFFFF;">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider" style="color: #FFFFFF;">
                                    Agent
                                </th>
                                <th scope="col" class="relative px-6 py-4">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y" style="background-color: #FFFFFF; divide-color: #F3F4F6;">
                            @forelse($bookings as $b)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium" style="color: #1E3A8A;">
                                        #{{ str_pad($b->id, 5, '0', STR_PAD_LEFT) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium" style="color: #374151;">
                                        {{ $b->package->title ?? '—' }}
                                    </div>
                                    @if($b->package)
                                    <div class="text-xs" style="color: #9CA3AF;">
                                        {{ Str::limit($b->package->description, 30) }}
                                    </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full flex items-center justify-center text-white font-semibold" 
                                                 style="background: linear-gradient(135deg, #FF6B35 0%, #F97316 100%);">
                                                {{ strtoupper(substr($b->customer_name, 0, 1)) }}
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium" style="color: #374151;">
                                                {{ $b->customer_name }}
                                            </div>
                                            <div class="text-sm" style="color: #9CA3AF;">
                                                {{ $b->customer_email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm font-semibold" style="color: #374151;">
                                        {{ $b->total_formatted }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @php
                                        $paymentColors = [
                                            'paid' => ['bg' => '#D1FAE5', 'text' => '#065F46'],
                                            'pending' => ['bg' => '#FEF3C7', 'text' => '#D97706'],
                                            'failed' => ['bg' => '#FEE2E2', 'text' => '#DC2626'],
                                        ];
                                        $colors = $paymentColors[$b->payment_status] ?? ['bg' => '#F3F4F6', 'text' => '#374151'];
                                    @endphp
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full"
                                          style="background-color: {{ $colors['bg'] }}; color: {{ $colors['text'] }};">
                                        {{ ucfirst($b->payment_status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @php
                                        $statusColors = [
                                            'new' => ['bg' => '#DBEAFE', 'text' => '#1E3A8A'],
                                            'approved' => ['bg' => '#D1FAE5', 'text' => '#065F46'],
                                            'rejected' => ['bg' => '#FEE2E2', 'text' => '#DC2626'],
                                            'pending' => ['bg' => '#FEF3C7', 'text' => '#D97706'],
                                        ];
                                        $colors = $statusColors[$b->admin_status] ?? ['bg' => '#F3F4F6', 'text' => '#374151'];
                                    @endphp
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full"
                                          style="background-color: {{ $colors['bg'] }}; color: {{ $colors['text'] }};">
                                        {{ ucfirst($b->admin_status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($b->agent)
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-8 w-8">
                                                <div class="h-8 w-8 rounded-full flex items-center justify-center text-white text-xs font-semibold" 
                                                     style="background-color: #1E3A8A;">
                                                    {{ strtoupper(substr($b->agent->name, 0, 1)) }}
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium" style="color: #374151;">
                                                    {{ $b->agent->name }}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-sm" style="color: #9CA3AF;">Unassigned</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.bookings.show', $b) }}" 
                                       class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-white shadow-sm hover:shadow-lg transform hover:scale-105 transition-all duration-200"
                                       style="background: linear-gradient(135deg, #FF6B35 0%, #F97316 100%);">
                                        <svg class="mr-2 -ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        View Details
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 mb-4" style="color: #9CA3AF;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-lg font-medium" style="color: #374151;">No bookings found</p>
                                        <p class="text-sm mt-1" style="color: #9CA3AF;">Try adjusting your filters or check back later</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            @if($bookings->hasPages())
            <div class="mt-6 flex items-center justify-between px-4 sm:px-0">
                <div class="flex-1 flex justify-between sm:hidden">
                    @if($bookings->previousPageUrl())
                        <a href="{{ $bookings->previousPageUrl() }}" 
                           class="relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-white"
                           style="background-color: #1E3A8A;">
                            Previous
                        </a>
                    @endif
                    @if($bookings->nextPageUrl())
                        <a href="{{ $bookings->nextPageUrl() }}" 
                           class="ml-3 relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-white"
                           style="background-color: #1E3A8A;">
                            Next
                        </a>
                    @endif
                </div>
                
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm" style="color: #374151;">
                            Showing
                            <span class="font-medium">{{ $bookings->firstItem() }}</span>
                            to
                            <span class="font-medium">{{ $bookings->lastItem() }}</span>
                            of
                            <span class="font-medium">{{ $bookings->total() }}</span>
                            results
                        </p>
                    </div>
                    <div>
                        {{ $bookings->withQueryString()->links() }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection